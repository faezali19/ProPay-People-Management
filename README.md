# ProPay SA — People Management System

A web-based people management system built with Laravel 10 and PHP 8.2.

---

## Requirements

- PHP 8.2
- Composer
- MySQL
- XAMPP (or any local server)

---

## Setup Instructions

### 1. Clone The Repository

git clone https://github.com/faezali19/ProPay-People-Management.git
cd ProPay-People-Management

### 2. Install Dependencies

composer install

### 3. Create Environment File

cp .env.example .env

Then open .env and update these values:

DB_DATABASE=people_app
DB_USERNAME=root
DB_PASSWORD=

### 4. Generate Application Key

php artisan key:generate

### 5. Create The Database

Open phpMyAdmin and create a database called people_app

### 6. Run Migrations and Seed

php artisan migrate:fresh --seed

### 7. Start The Server

php artisan serve

### 8. Open In Browser

http://127.0.0.1:8000

---

## Login Credentials

Email:    admin@admin.com
Password: password

---

## Features

- Secure login and logout system
- Add, view, edit and delete people
- Form validation on all fields
- SA ID number validation (exactly 13 digits)
- Mobile number validation (exactly 10 digits)
- Email notification sent when a person is added
- Audit log of all deletions stored in storage/logs/laravel.log
- All 11 South African official languages supported
- Multiple interests selection via checkboxes

---

## Email Testing

This project uses Mailtrap for email testing. When a person is added, an email is automatically sent to their email address and can be viewed in the Mailtrap inbox.

To configure your own Mailtrap credentials, update these values in .env:

MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password

---

## Tech Stack

- Backend:         PHP 8.2, Laravel 10
- Frontend:        HTML, CSS, Bootstrap 5
- Database:        MySQL
- Authentication:  Laravel Breeze
- Email:           Mailtrap SMTP