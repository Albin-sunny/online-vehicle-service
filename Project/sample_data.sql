-- Sample Data for Auto Repair Workshop Management System
-- Run this after creating the database schema

USE db_mini;

-- Insert sample districts
INSERT INTO tbl_district (district_name) VALUES 
('Thiruvananthapuram'),
('Kollam'),
('Pathanamthitta'),
('Alappuzha'),
('Kottayam'),
('Idukki'),
('Ernakulam'),
('Thrissur'),
('Palakkad'),
('Malappuram'),
('Kozhikode'),
('Wayanad'),
('Kannur'),
('Kasaragod');

-- Insert sample places for Thiruvananthapuram
INSERT INTO tbl_place (place_name, district_id) VALUES 
('Thiruvananthapuram City', 1),
('Neyyattinkara', 1),
('Attingal', 1),
('Nedumangad', 1),
('Varkala', 1);

-- Insert sample places for Ernakulam
INSERT INTO tbl_place (place_name, district_id) VALUES 
('Kochi', 7),
('Aluva', 7),
('Perumbavoor', 7),
('Muvattupuzha', 7),
('Thripunithura', 7);

-- Insert sample locations
INSERT INTO tbl_location (location_name, place_id) VALUES 
('Kazhakuttam', 1),
('Kowdiar', 1),
('Pettah', 1),
('Vazhuthacaud', 1),
('Medical College', 1),
('Fort Kochi', 6),
('Marine Drive', 6),
('Kaloor', 6),
('Edappally', 6),
('Kakkanad', 6);

-- Insert vehicle types
INSERT INTO tbl_vechicletype (vehicletype_name) VALUES 
('Two Wheeler'),
('Three Wheeler'),
('Four Wheeler'),
('Heavy Vehicle'),
('Commercial Vehicle');

-- Insert workshop types
INSERT INTO tbl_workshoptype (workshoptype_name) VALUES 
('General Service'),
('Engine Repair'),
('Electrical Service'),
('AC Service'),
('Tire Service'),
('Battery Service'),
('Complete Auto Care');

-- Insert complaint types
INSERT INTO tbl_complainttype (complainttype_name) VALUES 
('Engine Problem'),
('Brake Issue'),
('Electrical Problem'),
('AC Not Working'),
('Tire Problem'),
('Battery Issue'),
('General Service'),
('Oil Change'),
('Other');

-- Insert admin user (password: admin123)
INSERT INTO tbl_admin (admin_name, admin_email, admin_password) VALUES 
('System Administrator', 'admin@autorepair.com', 'admin123');

-- Insert sample users
INSERT INTO tbl_newuser (user_name, user_email, user_contact, user_password, user_photo, location_id) VALUES 
('John Doe', 'john@email.com', '9876543210', 'user123', 'user1.jpg', 1),
('Jane Smith', 'jane@email.com', '9876543211', 'user123', 'user2.jpg', 2),
('Mike Johnson', 'mike@email.com', '9876543212', 'user123', 'user3.jpg', 3),
('Sarah Wilson', 'sarah@email.com', '9876543213', 'user123', 'user4.jpg', 4),
('David Brown', 'david@email.com', '9876543214', 'user123', 'user5.jpg', 5);

-- Insert sample workshops (pending approval)
INSERT INTO tbl_workshopreg (workshopreg_name, workshopreg_email, workshopreg_contact, workshopreg_address, workshopreg_password, workshopreg_photo, workshopreg_proof, workshoptype_id, location_id, workshopreg_status) VALUES 
('Auto Care Center', 'autocare@email.com', '9876543220', 'Near Medical College, Thiruvananthapuram', 'workshop123', 'workshop1.jpg', 'proof1.jpg', 1, 1, 0),
('Engine Experts', 'engine@email.com', '9876543221', 'Kowdiar, Thiruvananthapuram', 'workshop123', 'workshop2.jpg', 'proof2.jpg', 2, 2, 0),
('Electrical Solutions', 'electrical@email.com', '9876543222', 'Pettah, Thiruvananthapuram', 'workshop123', 'workshop3.jpg', 'proof3.jpg', 3, 3, 0),
('AC Specialists', 'ac@email.com', '9876543223', 'Vazhuthacaud, Thiruvananthapuram', 'workshop123', 'workshop4.jpg', 'proof4.jpg', 4, 4, 0),
('Tire Masters', 'tire@email.com', '9876543224', 'Kazhakuttam, Thiruvananthapuram', 'workshop123', 'workshop5.jpg', 'proof5.jpg', 5, 5, 0);

-- Insert sample complaints
INSERT INTO tbl_complaint (complaint_titles, complaint_content, user_id) VALUES 
('Engine Making Noise', 'My car engine is making strange noises when I start it', 1),
('Brake Problem', 'Brakes are not working properly, need immediate attention', 2),
('AC Not Cooling', 'Air conditioning is not cooling properly', 3),
('Battery Issue', 'Car battery is draining quickly', 4),
('Tire Puncture', 'Need tire repair service urgently', 5);

-- Insert sample service requests
INSERT INTO tbl_rereques (user_id, workshop_id, vehicletype_id, Complainttype_id, request_description) VALUES 
(1, 1, 3, 1, 'Engine inspection and repair needed'),
(2, 2, 3, 2, 'Brake system check and repair'),
(3, 3, 3, 3, 'Electrical system diagnosis'),
(4, 4, 3, 4, 'AC system repair'),
(5, 5, 3, 5, 'Tire replacement service');

-- Insert sample ratings
INSERT INTO tbl_rating (user_id, workshop_id, rating_value, rating_comment) VALUES 
(1, 1, 5, 'Excellent service, highly recommended'),
(2, 2, 4, 'Good service, satisfied with the work'),
(3, 3, 5, 'Professional and efficient service'),
(4, 4, 4, 'Good quality work, reasonable price'),
(5, 5, 5, 'Outstanding service, will definitely return');

-- Insert sample bills
INSERT INTO tbl_bill (request_id, bill_amount, bill_description) VALUES 
(1, 2500.00, 'Engine repair and oil change'),
(2, 1800.00, 'Brake pad replacement'),
(3, 1200.00, 'Electrical system repair'),
(4, 3000.00, 'AC compressor repair'),
(5, 1500.00, 'Tire replacement and alignment');

