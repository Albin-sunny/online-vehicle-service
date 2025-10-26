-- Auto Repair Workshop Management System Database Schema
-- Database: db_mini

CREATE DATABASE IF NOT EXISTS db_mini;
USE db_mini;

-- Admin table
CREATE TABLE tbl_admin (
    admi_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(100) NOT NULL,
    admin_email VARCHAR(100) UNIQUE NOT NULL,
    admin_password VARCHAR(255) NOT NULL,
    admin_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- District table
CREATE TABLE tbl_district (
    district_id INT AUTO_INCREMENT PRIMARY KEY,
    district_name VARCHAR(100) NOT NULL,
    district_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Place table
CREATE TABLE tbl_place (
    place_id INT AUTO_INCREMENT PRIMARY KEY,
    place_name VARCHAR(100) NOT NULL,
    district_id INT NOT NULL,
    place_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (district_id) REFERENCES tbl_district(district_id)
);

-- Location table
CREATE TABLE tbl_location (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(100) NOT NULL,
    place_id INT NOT NULL,
    location_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (place_id) REFERENCES tbl_place(place_id)
);

-- Vehicle type table
CREATE TABLE tbl_vechicletype (
    vehicletype_id INT AUTO_INCREMENT PRIMARY KEY,
    vehicletype_name VARCHAR(100) NOT NULL,
    vehicletype_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Workshop type table
CREATE TABLE tbl_workshoptype (
    workshoptype_id INT AUTO_INCREMENT PRIMARY KEY,
    workshoptype_name VARCHAR(100) NOT NULL,
    workshoptype_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Complaint type table
CREATE TABLE tbl_complainttype (
    Complainttype_id INT AUTO_INCREMENT PRIMARY KEY,
    complainttype_name VARCHAR(100) NOT NULL,
    complainttype_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- New user table
CREATE TABLE tbl_newuser (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) NOT NULL,
    user_email VARCHAR(100) UNIQUE NOT NULL,
    user_contact VARCHAR(15) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_photo VARCHAR(255),
    location_id INT NOT NULL,
    user_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (location_id) REFERENCES tbl_location(location_id)
);

-- Workshop registration table
CREATE TABLE tbl_workshopreg (
    workshopreg_id INT AUTO_INCREMENT PRIMARY KEY,
    workshopreg_name VARCHAR(100) NOT NULL,
    workshopreg_email VARCHAR(100) UNIQUE NOT NULL,
    workshopreg_contact VARCHAR(15) NOT NULL,
    workshopreg_address TEXT NOT NULL,
    workshopreg_password VARCHAR(255) NOT NULL,
    workshopreg_photo VARCHAR(255),
    workshopreg_proof VARCHAR(255),
    workshoptype_id INT NOT NULL,
    location_id INT NOT NULL,
    workshopreg_status INT DEFAULT 0, -- 0=pending, 1=approved, 2=rejected
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (workshoptype_id) REFERENCES tbl_workshoptype(workshoptype_id),
    FOREIGN KEY (location_id) REFERENCES tbl_location(location_id)
);

-- Mechanic table
CREATE TABLE tbl_mechanic (
    mechanic_id INT AUTO_INCREMENT PRIMARY KEY,
    mechanic_name VARCHAR(100) NOT NULL,
    mechanic_email VARCHAR(100) UNIQUE NOT NULL,
    mechanic_contact VARCHAR(15) NOT NULL,
    mechanic_password VARCHAR(255) NOT NULL,
    mechanic_photo VARCHAR(255),
    mechanic_proof VARCHAR(255),
    workshopreg_id INT NOT NULL,
    mechanic_status INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (workshopreg_id) REFERENCES tbl_workshopreg(workshopreg_id)
);

-- Complaint table
CREATE TABLE tbl_complaint (
    complaint_id INT AUTO_INCREMENT PRIMARY KEY,
    complaint_titles VARCHAR(200) NOT NULL,
    complaint_content TEXT NOT NULL,
    complaint_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    complaint_status INT DEFAULT 0, -- 0=pending, 1=replied
    FOREIGN KEY (user_id) REFERENCES tbl_newuser(user_id)
);

-- Service request table
CREATE TABLE tbl_rereques (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    workshop_id INT NOT NULL,
    vehicletype_id INT NOT NULL,
    Complainttype_id INT NOT NULL,
    request_description TEXT,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    request_status INT DEFAULT 0, -- 0=pending, 1=accepted, 2=rejected
    FOREIGN KEY (user_id) REFERENCES tbl_newuser(user_id),
    FOREIGN KEY (workshop_id) REFERENCES tbl_workshopreg(workshopreg_id),
    FOREIGN KEY (vehicletype_id) REFERENCES tbl_vechicletype(vehicletype_id),
    FOREIGN KEY (Complainttype_id) REFERENCES tbl_complainttype(Complainttype_id)
);

-- Rating table
CREATE TABLE tbl_rating (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    workshop_id INT NOT NULL,
    rating_value INT NOT NULL CHECK (rating_value >= 1 AND rating_value <= 5),
    rating_comment TEXT,
    rating_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES tbl_newuser(user_id),
    FOREIGN KEY (workshop_id) REFERENCES tbl_workshopreg(workshopreg_id)
);

-- Bill table
CREATE TABLE tbl_bill (
    bill_id INT AUTO_INCREMENT PRIMARY KEY,
    request_id INT NOT NULL,
    bill_amount DECIMAL(10,2) NOT NULL,
    bill_description TEXT,
    bill_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    bill_status INT DEFAULT 0, -- 0=pending, 1=paid
    FOREIGN KEY (request_id) REFERENCES tbl_rereques(request_id)
);

-- Create indexes for better performance
CREATE INDEX idx_user_email ON tbl_newuser(user_email);
CREATE INDEX idx_workshop_email ON tbl_workshopreg(workshopreg_email);
CREATE INDEX idx_mechanic_email ON tbl_mechanic(mechanic_email);
CREATE INDEX idx_admin_email ON tbl_admin(admin_email);
CREATE INDEX idx_workshop_status ON tbl_workshopreg(workshopreg_status);
CREATE INDEX idx_request_status ON tbl_rereques(request_status);
CREATE INDEX idx_complaint_status ON tbl_complaint(complaint_status);

