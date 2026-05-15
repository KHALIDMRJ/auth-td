markdown
<div align="center">

# 🛡️ Secure Authentication System — PHP & MySQL

<img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=700&size=28&pause=1000&color=00D4FF&center=true&vCenter=true&width=900&lines=Secure+Authentication+System+%F0%9F%94%90;PHP+%7C+MySQL+%7C+PDO+%7C+Sessions;Cybersecurity+%7C+Web+Security+%7C+Backend;Professional+Authentication+Architecture;XSS+%7C+SQL+Injection+%7C+Session+Security" alt="Typing SVG" />

<br>

<img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" />
<img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
<img src="https://img.shields.io/badge/PDO-Secure%20Queries-orange?style=for-the-badge" />
<img src="https://img.shields.io/badge/Security-Enterprise%20Grade-success?style=for-the-badge" />
<img src="https://img.shields.io/badge/Authentication-Session%20Based-blue?style=for-the-badge" />
<img src="https://img.shields.io/badge/Protection-XSS%20%7C%20SQLi%20%7C%20Sessions-red?style=for-the-badge" />

<br><br>

<img src="https://img.shields.io/github/languages/top/KHALIDMRJ/auth-td?style=flat-square" />
<img src="https://img.shields.io/github/repo-size/KHALIDMRJ/auth-td?style=flat-square" />
<img src="https://img.shields.io/github/last-commit/KHALIDMRJ/auth-td?style=flat-square" />
<img src="https://img.shields.io/github/license/KHALIDMRJ/auth-td?style=flat-square" />
<img src="https://img.shields.io/badge/Status-Production%20Ready-brightgreen?style=flat-square" />
<img src="https://img.shields.io/badge/Maintained-Yes-success?style=flat-square" />

<br><br>

> 🚀 A modern and secure authentication system built with PHP, PDO, and MySQL following professional cybersecurity and backend engineering practices.

</div>

---

# 📌 Overview

This project is a **professional authentication platform** developed using modern PHP backend principles and advanced web security practices.

The system simulates the authentication workflow used in real-world applications such as:

- SaaS Platforms
- Enterprise Dashboards
- Banking Applications
- Educational Platforms
- Administration Systems
- Cloud Services

The objective of this project is not only to create a login/register system, but also to demonstrate a strong understanding of:

- Secure Authentication
- Session Management
- Web Security
- Database Protection
- Professional Backend Architecture

---

# 🎯 Main Features

## ✅ User Registration
- Secure account creation
- Form validation
- Email verification logic
- Duplicate email prevention
- Password confirmation system

---

## 🔐 Secure Authentication
- Password hashing using BCRYPT
- Session-based authentication
- Secure login verification
- Session regeneration protection

---

## 🛡️ Advanced Security
- SQL Injection prevention
- XSS protection
- Secure session destruction
- Authentication middleware
- Protected routes

---

## 🧠 Professional Backend Design
- Modular architecture
- PDO abstraction layer
- Reusable authentication middleware
- Organized folder structure

---

# 🏗️ Project Structure

```bash
auth-td/
│
├── config/
│   └── db.php
│
├── includes/
│   └── auth_check.php
│
├── dashboard.php
├── login.php
├── logout.php
├── registre.php
│
├── EX3.txt
├── EX4.txt
│
└── TD_Authentification_PHP_MySQL.pdf
````

---

# ⚡ Technologies Used

<div align="center">

| Technology  | Role                     |
| ----------- | ------------------------ |
| 🐘 PHP 8    | Backend Logic            |
| 🗄️ MySQL   | Database System          |
| 🔒 PDO      | Secure Database Access   |
| 🌐 HTML5    | User Interface           |
| 🎨 CSS3     | Styling                  |
| 🔐 Sessions | Authentication State     |
| 🛡️ BCRYPT  | Password Encryption      |
| ⚙️ XAMPP    | Local Server Environment |

</div>

---

# 🔥 Core Security Concepts

# 🔐 Password Hashing

Passwords are never stored in plain text.

```php
$hash = password_hash($mot_de_passe, PASSWORD_BCRYPT);
```

This generates a secure encrypted hash.

---

# 🔍 Password Verification

```php
password_verify($mot_de_passe, $hash);
```

Used during login authentication.

---

# 🛡️ SQL Injection Protection

All queries use PDO prepared statements.

```php
$stmt = $pdo->prepare(
    "SELECT * FROM utilisateurs WHERE email = ?"
);
```

This prevents malicious SQL injection attacks.

---

# 🚨 Session Fixation Protection

```php
session_regenerate_id(true);
```

A new secure session ID is generated after login.

---

# 🌐 XSS Protection

```php
htmlspecialchars($nom);
```

Protects the application from JavaScript injection attacks.

---

# 🧩 Database Design

## 📂 Database Creation

```sql
CREATE DATABASE auth_td
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

---

## 👤 Users Table

```sql
CREATE TABLE utilisateurs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(180) NOT NULL UNIQUE,
    mot_passe VARCHAR(255) NOT NULL,
    cree_le DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

---

# 🔄 Authentication Lifecycle

<div align="center">

```text
User Registration
        ↓
Password Hashing
        ↓
Database Storage
        ↓
User Login
        ↓
Password Verification
        ↓
Session Creation
        ↓
Protected Dashboard Access
        ↓
Secure Logout
```

</div>

---

# 🛡️ Authentication Middleware

The file:

```php
includes/auth_check.php
```

acts as a middleware layer.

It protects all private pages from unauthorized access.

```php
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
```

---

# 🚪 Secure Logout System

```php
$_SESSION = [];
session_destroy();
```

This completely destroys the session and removes all authentication data.

---

# 🧠 Security Analysis

# ❓ Why use vague error messages?

Instead of:

❌ "Email does not exist"

We use:

✅ "Email ou mot de passe incorrect"

This prevents attackers from discovering valid accounts.

---

# ❓ Why not store passwords in session?

Passwords are sensitive information.

Only minimal data should be stored:

```php
$_SESSION['user_id']
$_SESSION['user_nom']
```

---

# ❓ Why use `exit` after `header()`?

Without `exit`, PHP continues executing the script after redirection.

This may expose protected logic or sensitive data.

---

# 🚀 Installation Guide

# 1️⃣ Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/auth-td.git
```

---

# 2️⃣ Move the Project

Place it inside:

```bash
C:\xampp\htdocs\
```

---

# 3️⃣ Start XAMPP

Launch:

* Apache
* MySQL

---

# 4️⃣ Import Database

Use phpMyAdmin to import the SQL schema.

---

# 5️⃣ Configure Database Credentials

Edit:

```php
config/db.php
```

Example:

```php
$user = 'root';
$pass = '';
```

---

# 6️⃣ Run the Project

Open in browser:

```bash
http://localhost/auth-td/
```

---

# 🌟 Future Improvements

* ✅ CSRF Protection
* ✅ Remember Me System
* ✅ Email Verification
* ✅ Password Reset
* ✅ Admin Dashboard
* ✅ Role-Based Access Control
* ✅ Two-Factor Authentication
* ✅ JWT Authentication
* ✅ OAuth Login
* ✅ Login Rate Limiting

---

# 📚 Educational Value

This project demonstrates professional knowledge in:

* Backend Development
* Authentication Systems
* Web Security
* Session Management
* Secure Database Interaction
* Cybersecurity Fundamentals

---

# 👨‍💻 Author

<div align="center">

# Khalid Morjane

🎓 Final-Year Student
🤖 Artificial Intelligence & Data Science
🛡️ Cybersecurity & Backend Engineering Enthusiast

</div>

---

# ⭐ Final Note

Authentication is one of the most critical parts of modern software systems.

This project demonstrates how professional authentication systems are designed using secure coding principles and modern backend engineering practices.

It reflects real-world concepts used in enterprise-grade applications and modern SaaS architectures.

---

<div align="center">

## 🚀 Secure • Professional • Scalable • Production-Inspired

</div>
