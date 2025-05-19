# Laravel Listings App

A simple Laravel 12 application for managing service listings with categories, users, and a seeded database for testing and development.

## Screen Shot
![Untitled design](https://github.com/user-attachments/assets/115f4bd6-f872-48e7-8bdf-3c2cf4b5ea6e)


## Features
User Authentication: Secure registration and login system.

Service Listings: Create, read, update, and delete handyman service entries.

Database Seeding: Pre-populated data for testing and development.

Responsive Design: Mobile-friendly interface using Tailwind CSS.

## Requirements

- PHP >= 8.1
- Composer
- SQLite (or another database of your choice)
- Node.js and NPM (for frontend assets, optional)

## Installation

Clone the repository:
```bash
git clone https://github.com/EnrikasVai/HandyManListings.git
cd HandyManListings
```

Install dependencies:
```bash
composer install
npm install
```

Run migrations and seeders:
```bash
php artisan migrate --seed
```

Start the development server:
```bash
php artisan serve
```

Compile frontend assets:
```bash
npm run dev
```
