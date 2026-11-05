-- Insert 2 rows into students
INSERT INTO students (studentname, gender, age, dob, subject, payment, description)
VALUES
('um visal', 'Male', 20, '2025-01-15 08:00:00', 'Web Programming', 150.00, 'Regular student'),
('Chan Sophea', 'Female', 21, '2025-02-10 08:00:00', 'Database Systems', 180.50, NULL);

-- Insert 2 rows into products
INSERT INTO products (productname, price, quantity, amount, description, created_at, updated_at)
VALUES
('Laptop Dell XPS 13', 1200.00, 5, 6000.00, 'High performance laptop', NOW(), NOW()),
('Wireless Mouse', 15.50, 20, 310.00, NULL, NOW(), NOW());
