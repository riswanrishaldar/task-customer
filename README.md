# PHP Full Stack Developer Task Submission

## Overview
This project is my submission for the PHP Full Stack Developer technical assessment.

It includes:
- Task 1: Customer web application with authentication, forgot password, customer DataTable, add/edit customer features
- Task 2: API-based copy of customer records from Customer to Customer2
- Task 3: OpenCart 3.0.4.1 setup and documentation

## Tech Stack
- Laravel 13
- Blade
- MySQL / MariaDB
- jQuery
- DataTables
- Bootstrap / Tailwind (whichever you used)
- OpenCart 3.0.4.1 (for Task 3)

## Features Completed

### Task 1
- Login
- Forgot Password
- Dashboard with customer DataTable
- Sorting, searching, pagination
- Select row(s) and open edit page in new tab
- Add new customer
- Update customer and refresh listing

### Task 2
- Customer2 table created
- Copy Data screen
- API endpoint to copy all records from Customer to Customer2

### Task 3
- Installed OpenCart 4.0.4.1
- Installed free theme
- Installed free chat extension


## Setup Instructions

### 1. Clone the repository
```bash
git clone  https://github.com/riswanrishaldar/task-customer
cd task-customer
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```


### 4. Import SQL
Import:
- `database/sql/customer.sql`
- `database/sql/customer2.sql`

### 5. Run migrations if required
```bash
php artisan migrate
```

### 6. Build assets
```bash
npm run build
```

### 7. Start the app
```bash
php artisan serve
```

## 
- Source customer table retained from provided SQL structure
- Customer2 is refreshed before each copy operation
- Selected rows open in separate tabs for editing
- Task 3 was completed on local OpenCart setup

## Third-Party Libraries / Packages Used
- laravel/breeze
- yajra/laravel-datatables
- jQuery DataTables
- Bootstrap / Tailwind
- Any OpenCart theme or chat extension used


- `docs/opencart-task3.md`
