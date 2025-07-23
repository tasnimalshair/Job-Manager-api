# Job Manager API

A Laravel 12 RESTful API for job listings and applications. Users can browse and apply for jobs, while admins can manage job posts and application statuses.

---

## 🚀 Features

- 🔐 User authentication (register/login)
- 🧑‍💼 Role-based access (Admin & User)
- 📋 Job CRUD (Admin only)
- 📩 Apply to jobs (User only, one-time per job)
- ✉️ Email notification when application is accepted
- 🧾 Application logging
- ✅ Feature Testing and unit testing
- 📖 API Documentation included

---

## ⚙️ Requirements

- PHP 8.2+
- Laravel 12
- MySQL
- Composer
- Gmail SMTP for email testing

---

## 🛠️ Installation & Setup

```bash
git clone https://github.com/your-username/job-manager-api.git
cd job-manager-api

composer install
cp .env.example .env
php artisan key:generate

``` 

### Configure .env:
Set your DB credentials and email settings:
```env
DB_DATABASE=job_manager
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tasnimjalshair2002@gmail.com
MAIL_PASSWORD=uheghlynzmhvfgzr
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tasnimjalshair2002@gmail.com
MAIL_FROM_NAME="Job Manager"
```
### Then run:
``` 
php artisan migrate --seed
php artisan serve

```
---

## 📌 API Endpoints

### 🔐 Auth

| Method | Endpoint      | Description        |
|--------|---------------|--------------------|
| POST   | /api/register | Register new user  |
| POST   | /api/login    | Login user         |

---

### 🧑‍💼 Admin - Jobs Management

| Method | Endpoint                      | Description                  |
|--------|-------------------------------|------------------------------|
| GET    | /api/admin/jobs               | List all jobs                |
| GET    | /api/admin/jobs/{job}         | Show specific job            |
| POST   | /api/admin/jobs               | Create a job                 |
| PUT    | /api/admin/jobs/{job}         | Update job                   |
| DELETE | /api/admin/jobs/{job}         | Delete job                   |
| GET    | /api/admin/jobs/toggleStatus/{job} | View current status         |
| POST   | /api/admin/jobs/toggleStatus/{job} | Toggle job status (active/inactive) |

---

### 🗃️ Admin - Applications Management

| Method | Endpoint                                      | Description                          |
|--------|-----------------------------------------------|--------------------------------------|
| GET    | /api/admin/applications                       | View all applications                |
| GET    | /api/admin/jobs/{id}/applications             | Filter applications by job ID        |
| GET    | /api/admin/applications/{application}/accept  | Accept an application (send email)   |

---

### 👩‍💻 User - Job Browsing

| Method | Endpoint                | Description               |
|--------|-------------------------|---------------------------|
| GET    | /api/user/jobs          | List all active jobs      |
| GET    | /api/user/jobs/{job}    | Show specific job         |
| GET    | /api/user/jobs/filter   | Filter jobs               |

---

### 📝 User - Job Applications

| Method | Endpoint                     | Description               |
|--------|------------------------------|---------------------------|
| POST   | /api/user/jobs/{job}/apply   | Apply for a job           |
| GET    | /api/user/applications       | List my applications      |
| GET    | /api/user/applications/{id}  | View specific application |
| DELETE | /api/user/applications/{id}  | Delete application        |


---

## 🧪 Running Tests
php artisan test

---

## 🧾 Logs

Every job update is logged for audit purposes.
Example (in storage/logs/application.log):
```
[2025-07-21 12:13:39] local.INFO: Status updated successfully! {"old_status":"inactive","updated_status":"active"}
```
---

## 📖 API Documentation

You can explore and test all endpoints using the Postman collection provided.

### 🧭 Access it in two ways:
1. 🌐 **Online via Postman link**:  
   [Open in Postman Workspace](https://galactic-resonance-381977-1.postman.co/workspace/Laravel-APIs~1d8bfc4e-3141-40de-a5cf-547e35bad429/collection/17630419-aeff1ccf-290d-446d-bc40-15457003ddff?action=share&creator=17630419&active-environment=17630419-7b4af655-c6aa-4e4e-9242-d268c41ee398)

2. 📁 **Locally in the project**:  
   Navigate to `docs/Job Manager.postman_collection.json` and import it manually into Postman.

---

## 🖼️ Screenshots

### 🔐 Postman Token Variables

Used to authorize admin/user requests easily in the collection.
<img width="1366" height="768" alt="token_variables" src="https://github.com/user-attachments/assets/fb3cdf0d-d449-4534-a26f-343d88a72201" />

---

### ✉️ Email Notification Preview

Example email sent to a user when their job application is accepted.
<img width="788" height="526" alt="email" src="https://github.com/user-attachments/assets/a0e5412c-3baa-4d01-999b-b43020fc816b" />

---

### ✅ Test Results

Snapshot from running `php artisan test` showing successful feature tests.
<img width="1366" height="768" alt="test_result" src="https://github.com/user-attachments/assets/52b8be1b-2e6a-45d6-8c2a-bbbf5593e59e" />

---

## 📬 Contact

**Developed by Tasnim Alshair**

📫 **Email:** [tasnimjalshair2002@gmail.com](mailto:tasnimjalshair2002@gmail.com)  
🔗 **GitHub:** [github.com/tasnimalshair](https://github.com/tasnimalshair)  
🔗 **LinkedIn:** [linkedin.com/in/tasnim-alshair-aa11a4266](https://www.linkedin.com/in/tasnim-alshair-aa11a4266/)





















