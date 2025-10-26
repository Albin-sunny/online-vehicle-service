# Auto Repair Workshop Management System - Setup Guide

## Prerequisites
- PHP 7.0 or higher
- MySQL 5.7 or higher / MariaDB 10.2 or higher
- Apache/Nginx web server
- XAMPP/WAMP/LAMP stack (recommended for local development)

## Installation Steps

### 1. Database Setup
1. Open phpMyAdmin or MySQL command line
2. Import the database schema:
   ```sql
   source database_schema.sql
   ```
3. Import sample data (optional):
   ```sql
   source sample_data.sql
   ```

### 2. File Permissions
Ensure the following directories have write permissions:
- `Assets/File/User/`
- `Assets/File/Workshop/`
- `Assets/File/Mechanic/`

### 3. Configuration
1. Update database connection in `Assets/Connection/Connection.php` if needed:
   ```php
   $servername="localhost";
   $username="root";
   $password="";
   $database="db_mini";
   ```

### 4. Web Server Setup
1. Place the project folder in your web server directory:
   - XAMPP: `C:\xampp\htdocs\`
   - WAMP: `C:\wamp\www\`
   - Linux: `/var/www/html/`

2. Access the application:
   - Main site: `http://localhost/Project/`
   - Admin panel: `http://localhost/Project/admin/Homepage.php`

## Default Login Credentials

### Admin Login
- **Email:** admin@autorepair.com
- **Password:** admin123

### Sample User Accounts
- **Email:** john@email.com | **Password:** user123
- **Email:** jane@email.com | **Password:** user123
- **Email:** mike@email.com | **Password:** user123

### Sample Workshop Accounts
- **Email:** autocare@email.com | **Password:** workshop123
- **Email:** engine@email.com | **Password:** workshop123

## Features Overview

### Admin Panel
- Dashboard with statistics
- Workshop verification (approve/reject)
- Basic data management (districts, places, locations)
- Complaint management
- User management

### User Portal
- User registration and profile management
- Workshop search and selection
- Service request submission
- Complaint filing
- Rating and feedback system
- Request tracking

### Workshop Portal
- Workshop registration and profile management
- Mechanic management
- Service request handling
- Bill generation
- Request acceptance/rejection

### Mechanic Portal
- Profile management
- Assigned work tracking
- Work completion updates

## File Structure
```
Project/
├── admin/                 # Admin panel files
├── user/                  # User portal files
├── Workshop/              # Workshop portal files
├── Mechanic/              # Mechanic portal files
├── Guest/                 # Guest access files
├── Assets/                # Static assets
│   ├── Connection/        # Database connection
│   ├── File/              # File uploads
│   ├── Templates/         # UI templates
│   └── JQ/                # jQuery files
├── index.php              # Main homepage
├── database_schema.sql    # Database structure
└── sample_data.sql        # Sample data
```

## Troubleshooting

### Common Issues
1. **Database Connection Error**
   - Check MySQL service is running
   - Verify database credentials in Connection.php
   - Ensure database `db_mini` exists

2. **File Upload Issues**
   - Check directory permissions
   - Verify upload_max_filesize in php.ini
   - Ensure Assets/File/ directories exist

3. **Session Issues**
   - Check session.save_path in php.ini
   - Ensure session_start() is called

4. **Permission Denied**
   - Set proper file permissions (755 for directories, 644 for files)
   - Check web server user permissions

### PHP Configuration
Ensure these PHP settings are enabled:
- `file_uploads = On`
- `upload_max_filesize = 10M`
- `post_max_size = 10M`
- `session.auto_start = 0`

## Security Notes
- Change default passwords after installation
- Use strong passwords for production
- Enable HTTPS for production deployment
- Regular database backups recommended
- Keep PHP and MySQL updated

## Support
For technical support or customization requests, contact the development team.

---
**Version:** 1.0  
**Last Updated:** 2024  
**Compatible with:** PHP 7.0+, MySQL 5.7+

