# G-Scores – Student Score Management

This project is a Laravel-based web application built as an assignment to manage and analyze national high school exam scores.

---

## Features:

### 1. Score Checking

- Search student scores by registration number (SBD)
- Display detailed subject scores
- Show validation error when the registration number is not found

---

### 2. Score Report (Statistics)

- Analyze score distribution by subject

- Score levels:
    - ≥ 8
    - 8 > x ≥ 6
    - 6 > x ≥ 4
    - < 4

- Display bar charts for each score range
- Dynamic subject selection

---

### 3. Top Students Ranking (Multiple Groups)

- Support multiple subject groups:
- Users can select group dynamically
- Calculate total score based on selected group
- Display **Top 10 students** ranked by total score

---

### 4. UI Customization (Settings)

- Adjust font size:
  - Small (14px)
  - Medium (16px – default)
  - Large (18px)

---

### 5. Responsive UI

- Responsive layout using Bootstrap 5
- Sidebar navigation with offcanvas menu
- Optimized for mobile, tablet, and desktop

---

## 🛠 Tech Stack

- Backend: Laravel 12.x, PHP >= 8.2
- Database: MySQL(local), PostgreSQL(render)
- Frontend: Blade, Bootstrap 5, JavaScript
- Environment: Docker

---

## Database & Seeder

- Data source: CSV file
- Imported using Laravel Seeder
- Optimized with:
  - Batch insert (1000 rows per batch)
  - Disabled query log
  - Manual garbage collection

---

## Installation

1. Clone the repository:
	```bash
	git clone https://github.com/your-username/your-repo.git
    cd your-repo

2. Create environment file:
	```bash
	cp .env.example .env

3. Configure database in .env:
	```bash
	DB_DATABASE=your_database
	DB_USERNAME=your_username
	DB_PASSWORD=your_password
    DB_ROOT_PASSWORD=your_root_password

4. Build & start Docker containers:
    ```bash
    docker compose up -d --build

5. Install composer:
    ```bash
    docker compose exec app composer install

6. Generate application key:
    ```bash
    docker compose exec app php artisan key:generate

7. Run migrations and seeders:
	```bash
	docker compose exec app php artisan migrate:fresh --seed

8. Access the application:
	Web app: http://localhost:8000
