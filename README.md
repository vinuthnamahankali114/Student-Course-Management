# 🎓 Smart Campus Management System

A **full-stack web application** developed using **PHP, MySQL, Bootstrap, HTML, CSS, and JavaScript** to simplify campus administration through role-based access for **Admin**, **Faculty**, and **Students**.

---

## 📌 Project Overview

The **Smart Campus Management System** is designed to digitize and streamline academic management. It enables administrators, faculty members, and students to efficiently manage courses, enrollments, attendance, marks, study materials, and user profiles through a secure web interface.

---

## ✨ Features

### 👨‍💼 Admin Module

* Secure Login & Logout
* Dashboard with Analytics
* Manage Users (Admin, Faculty, Students)
* Add, Edit & Delete Courses
* Manage Student Enrollments
* View Attendance Records
* View Student Marks
* Manage Study Notes
* Profile Management

### 👨‍🏫 Faculty Module

* Secure Login
* Faculty Dashboard
* Mark Student Attendance
* Add & View Student Marks
* Upload Study Notes
* Delete Notes
* Update Profile
* Logout

### 🎓 Student Module

* Secure Login
* Student Dashboard
* View Enrolled Courses
* View Attendance
* View Marks
* Download Study Notes
* Update Profile
* Logout

### 🔐 Authentication

* Role-Based Login
* Password Hashing
* Session Management
* Forgot Password
* Secure Logout

---

## 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* Font Awesome

### Backend

* PHP 8

### Database

* MySQL

### Development Tools

* XAMPP
* phpMyAdmin
* Visual Studio Code
* Git & GitHub

---

## 📂 Project Structure

```text
smart-campus-management/
│
├── admin/
├── faculty/
├── student/
├── config/
├── includes/
├── uploads/
│   ├── notes/
│   └── profile/
├── assets/
├── login.php
├── register.php
├── forgot_password.php
├── logout.php
├── index.php
└── README.md
```

---

## 📊 Modules Implemented

* User Management
* Course Management
* Enrollment Management
* Attendance Management
* Marks Management
* Notes Management
* Profile Management
* Dashboard Analytics
* Authentication & Authorization

---

## 🖥️ System Workflow

```text
Admin
   │
   ├── Manage Users
   ├── Manage Courses
   ├── Manage Enrollments
   ├── View Attendance
   ├── View Marks
   └── Manage Notes

Faculty
   │
   ├── Mark Attendance
   ├── Add Marks
   ├── Upload Notes
   └── Update Profile

Student
   │
   ├── View Courses
   ├── View Attendance
   ├── View Marks
   ├── Download Notes
   └── Update Profile
```

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_GITHUB_USERNAME/smart-campus-management.git
```

### 2. Move the Project

Copy the project folder to:

```text
C:\xampp\htdocs\
```

### 3. Start XAMPP

Start:

* Apache
* MySQL

### 4. Create Database

Create a MySQL database:

```text
smart_campus
```

Import the provided SQL file using **phpMyAdmin**.

### 5. Run the Project

Open your browser and visit:

```text
http://localhost/smart-campus-management/
```

---

## 📸 Screenshots

Add screenshots of:

* Login Page
* Admin Dashboard
* Faculty Dashboard
* Student Dashboard
* Course Management
* Attendance Module
* Marks Module
* Notes Module
* Profile Page

---

## 🔒 Security Features

* Password Hashing using `password_hash()`
* Password Verification using `password_verify()`
* Session-Based Authentication
* Role-Based Access Control
* SQL Injection Protection using `mysqli_real_escape_string()`

---

## 📈 Future Enhancements

* Email OTP Password Reset
* PDF Report Generation
* QR Code Attendance
* Timetable Management
* Library Management
* Fee Management
* Online Examination System
* AI-Based Student Performance Analysis
* Mobile Application

---

## 📚 Learning Outcomes

This project helped in understanding:

* PHP Programming
* MySQL Database Design
* CRUD Operations
* Authentication & Authorization
* Session Management
* File Upload Handling
* Responsive UI Design
* Software Development Lifecycle
* Database Connectivity
* Role-Based Access Control

---

## 👩‍💻 Developer

**Vinuthna Mahankali**

**B.Tech – Computer Science & Information Technology**

**Lakireddy Bali Reddy College of Engineering (LBRCE)**

---

## 📄 License

This project is developed for educational and internship purposes.

---

## ⭐ Support

If you found this project useful, consider giving it a **⭐ Star** on GitHub.

Feedback and suggestions are always welcome.
