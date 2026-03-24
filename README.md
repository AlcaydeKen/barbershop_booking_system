# 💈 Barbershop Booking System

Barbershop Booking System is a full-stack web application that lets customers book haircut and grooming appointments online. It also includes an **admin panel** for managing barbers, services, and appointments.

## ✨ Features

### 👤 User Side
- 📝 User registration and login
- 💇‍♂️ Browse barbers and services
- 📅 View available time slots
- 🪒 Book haircut and grooming appointments
- 🔎 Search services and barbers
- 📋 View appointment history
- 👤 Edit user profile

### 🛠️ Admin Side
- 🔐 Admin authentication
- 💈 Manage barbers
- ✏️ Add / update / delete services
- 📊 Monitor booked appointments
- 📅 Manage time slots

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Local Server:** XAMPP

## 📂 Project Structure

```bash
barbershop_booking_system/
├── admin/                # Admin panel files
├── api/                  # Backend/API scripts
├── css/                  # Stylesheets
├── js/                   # JavaScript files
├── images/               # Static images
├── components/           # Reusable PHP components
├── index.php             # Homepage
├── login.php
├── register.php
├── services.php          # List services
├── book.php              # Booking page
├── profile.php
├── appointments.php      # User appointments
├── db.sql                # Database file
├── config.php            # Database connection
└── README.md
```

🚀 Installation Guide

1️⃣ Clone the repository
```bash
git clone https://github.com/AlcaydeKen/barbershop_booking_system.git
cd barbershop_booking_system
```

2️⃣ Move the project to your XAMPP htdocs folder

Example:
```bash
C:\xampp\htdocs\barbershop_booking_system
```

3️⃣ Start Apache and MySQL

Open XAMPP Control Panel and start:

- Apache ⚡
- MySQL 🗄️

4️⃣ Import the database

- Open phpMyAdmin
- Create a new database
- Import the ```db.sql``` file 📄

5️⃣ Configure the database connection

Open ```config.php``` and update the credentials if needed:
```bash
$host = "localhost";
$user = "root";
$password = "";
$dbname = "barbershop_db";
```

6️⃣ Run the project

Open your browser and go to:
```bash
http://localhost/barbershop_booking_system/
```

🖥️ Screens / Main Pages

- index.php – 🏠 Homepage
- services.php – 💈 List of services
- book.php – 📅 Booking page
- appointments.php – 📋 User booked appointments
- profile.php – 👤 User profile
- admin/ – 🛠️ Admin dashboard

🗄️ Database

The database file is included in the project:
```bash
db.sql
```

Import this file into MySQL using phpMyAdmin before running the project.

🔮 Future Improvements
- 📆 Dynamic time slots per barber
- 📨 Email or SMS notifications
- 💳 Online payment integration
- 📱 Mobile-friendly UI
- 📊 Admin analytics dashboard

🎯 Purpose

This project was developed as a barbershop booking system to streamline appointments and showcase full-stack web development using PHP and MySQL. It demonstrates authentication, role-based access control, CRUD operations, and appointment management.

👨‍💻 Author

Ken Jared Alcayde

GitHub: [@AlcaydeKen](https://github.com/AlcaydeKen)
