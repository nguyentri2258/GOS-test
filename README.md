# G-Scores – Student Score Management

This project is a Laravel-based web application built as an assignment to manage and analyze national high school exam scores.

The system allows users to:
- Search student scores by registration number
- View statistical reports by subject and score levels
- View top 10 students in Group A (Math, Physics, Chemistry)

## Features

1. Score Checking

- Search student scores by registration number (SBD)
- Display detailed subject scores
- Show validation error when registration number is not found

2. Score Report (Statistics)

Score levels:
- ≥ 8
- 8 > x ≥ 6
- 6 > x ≥ 4
- < 4

Display bar chart showing number of students in each score level and dynamic subject selection

3. Top 10 Students – Group A

- Group A includes: Math, Physics, Chemistry
- Calculate total score = Math + Physics + Chemistry
- Display top 10 students ordered by total score

4. Responsive UI

- Responsive layout using Bootstrap 5
- Sidebar navigation with offcanvas menu
- Mobile, tablet, and desktop friendly

## Tech Stack

- Backend: Laravel 12.x and PHP >= 8.2
- Database: MySQL
- Frontend: Blade, Bootstrap 5
- Environment: Docker

## Database and Seeder

- Data source: CSV file
- Imported using Laravel Seeder
- Batch insert (1000 rows per batch) to reduce memory usage
- Disabled query log and manual garbage collection for performance

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

5. Generate application key:
    ```bash
    docker compose exec app php artisan key:generate

6. Run migrations and seeders:
	```bash
	docker compose exec app php artisan migrate:fresh --seed

7. Access the application:
	Web app: http://localhost:8000
