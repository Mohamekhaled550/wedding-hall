# Wedding Hall Management System

This is a Laravel-based system designed for managing wedding hall bookings, clients, services, invoices, and administrative roles with permission control using Spatie Laravel Permission. The project includes an admin panel built with Metronic template, dynamic sidebar, room management, photo and music options, and service add-ons.

## Requirements

- PHP >= 8.1
- Composer
- Laravel >= 10
- Node.js & npm (for frontend assets)
- MySQL or compatible DB
- Git (recommended)

---

## Installation Guide

### 1. Clone the repository

git clone https://github.com/your-username/wedding-hall-system.git
cd wedding-hall-system

2. Install dependencies
composer install
npm install

3. Create and configure .env
cp .env.example .env


4. Generate app key
php artisan key:generate


5. Run migrations
php artisan migrate

6. Run seeders
php artisan db:seed



7. Compile frontend assets
npm run dev

8. Start the development server
php artisan serve


Default Admin Login

Email: superadmin@app.com
Password: password



Features
🎯 Multi-role admin panel (Super Admin, Accountant, Manager, etc.)

🔐 Role & Permission Management (Spatie Laravel Permission)

🧾 Invoice System with customizable items and optional add-ons

🪑 Room and Hall management with options

📷 Photo and Music packages

📊 Dashboard & Reports

📂 Archived invoices and filtering

🔎 Search, sort, and export data

🌐 Dynamic Metronic Sidebar (based on permissions)

🧑 Client management on invoice creation (auto-create on the fly)



Folder Structure Highlights
app/Http/Controllers/Dashboard - Admin Panel Controllers

app/Models - Eloquent Models

resources/views/dashboard - Blade templates (Metronic)

database/seeders - All seeders including roles, users, settings

routes/web.php - Main route file

routes/dashboard.php - Admin panel routes

Notes
When creating a new invoice, clients are automatically created with basic info.

Only users with the super-admin role can manage permissions and roles.

Archived invoices are still searchable and viewable but locked from editing.

License
This project is open-source and available for any use. Feel free to customize and extend it as needed.

Contact
For issues, suggestions, or contributions:
GitHub Issues

contact me : hamok550@gmail.com
