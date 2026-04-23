<?php

namespace App\Jobs;

use App\Models\Ingredient;
use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckLowStockJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Starting low stock check...');

        $ingredients = Ingredient::where('stock_alert_enabled', true)->get();

        foreach ($ingredients as $ingredient) {
            if ($ingredient->isLowStock()) {
                // إنشاء إشعار للمخزون المنخفض
                $existingNotification = Notification::where('title', 'LIKE', '%' . $ingredient->name . '%')
                    ->whereDate('created_at', today())
                    ->exists();

                if (!$existingNotification) {
                    Notification::create([
                        'title' => 'تحذير: المخزون منخفض - ' . $ingredient->name,
                        'invoice_id' => null,
                        'user_id' => null
                    ]);

                    Log::warning("Low stock alert: {$ingredient->name} (Current: {$ingredient->current_stock}, Minimum: {$ingredient->minimum_stock})");
                }
            }
        }

        Log::info('Low stock check completed.');
    }
}
