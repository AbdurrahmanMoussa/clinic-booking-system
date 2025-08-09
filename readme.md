# Accounts, Seeding, and Usage

## Test Accounts

**Patient**

-   Email: `patient@test.com`
-   Password: `password`

**Doctors** (all passwords: `password`)

-   `maya.patel@example.com`
-   `lucas.chen@example.com`
-   `amina.yusuf@example.com`
-   `ethan.roy@example.com`
-   `sofia.martinez@example.com`

## Setup Instructions

From a fresh clone:

## Install Dependencies

```bash
composer install
npm install
```

## Configure Database and Seed

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed

# Ensure all timeslots are seeded
php artisan db:seed --class=TimeslotSeeder
```

## Run Application

```bash
php artisan serve
npm run dev
```
