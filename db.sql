DROP DATABASE IF EXISTS jibk;
CREATE DATABASE IF NOT EXISTS jibk;

USE jibk;

DROP TABLE IF EXISTS expenses;
CREATE TABLE IF NOT EXISTS expenses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL,
    date DATE DEFAULT curdate()
); 


DROP TABLE IF EXISTS incomes;
CREATE TABLE IF NOT EXISTS incomes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT DEFAULT NULL,
    date DATE DEFAULT curdate()
); 

select *, "expense" as type from expenses
UNION
select *, "income" as type from incomes
order by date;


INSERT INTO incomes (title, amount, description, date) VALUES
('Salary Payment', 3500.00, 'Monthly salary for January', '2025-01-31'),
('Freelance Project', 800.00, 'Website design project payment', '2025-02-03'),
('Stock Dividend', 120.50, 'Quarterly dividend payout', '2025-02-10'),
('Bonus', 500.00, 'Performance bonus', '2025-02-15'),
('Rental Income', 1000.00, 'Monthly rent from apartment', '2025-02-28'),
('Gift', 200.00, 'Money received as a birthday gift', '2025-03-05'),
('Consulting Fee', 1500.00, 'Consulting services for a client', '2025-03-12'),
('Interest Income', 45.75, 'Bank account interest', '2025-03-20'),
('Online Sales', 320.00, 'Sold items through online marketplace', '2025-03-25'),
('Refund', 75.00, 'Refund for returned product', '2025-03-28');


INSERT INTO expenses (title, amount, description, date) VALUES
('Groceries', 120.45, 'Weekly grocery shopping', '2025-01-05'),
('Electricity Bill', 75.60, 'Monthly electricity payment', '2025-01-10'),
('Internet Bill', 55.00, 'Monthly internet subscription', '2025-01-12'),
('Restaurant', 42.30, 'Dinner with friends', '2025-01-15'),
('Gas', 65.00, 'Car fuel refill', '2025-01-18'),
('Gym Membership', 40.00, 'Monthly gym subscription', '2025-01-20'),
('Clothing', 90.99, 'Bought new clothes', '2025-01-25'),
('Healthcare', 150.00, 'Routine medical check-up', '2025-01-28'),
('Transportation', 25.50, 'Public transport expenses', '2025-02-01'),
('House Supplies', 34.80, 'Cleaning and household supplies', '2025-02-03');
