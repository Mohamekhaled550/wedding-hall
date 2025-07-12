<?php


namespace App\Observers;

use App\Models\Invoice;
use App\Models\InvoicesDetails;

class InvoiceDetailObserver
{
    public function saved(InvoicesDetails $detail)
    {
        $invoice = $detail->invoice;

        if (!$invoice) return;

        $total = $invoice->Total;
        $paid = $invoice->invoiceDetails()->sum('paid_amount');

        if ($paid == 0) {
            $invoice->Value_Status = 2;
            $invoice->Status = 'غير مدفوعة';
        } elseif ($paid < $total) {
            $invoice->Value_Status = 3;
            $invoice->Status = 'مدفوعة جزئياً';
        } else {
            $invoice->Value_Status = 1;
            $invoice->Status = 'مدفوعة كلياً';
        }

        $invoice->save();
    }

    public function deleted(InvoicesDetails $detail)
    {
        $this->saved($detail); // نفس المعالجة لو حذفنا دفعة
    }
}
