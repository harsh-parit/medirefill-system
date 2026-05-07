-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 04:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medirefill`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` text,
  `medical_notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO customers
(name, phone, email, age, address, medical_notes)
VALUES

('Rahul Sharma', '9876543210', 'rahul.sharma@gmail.com', 45,
'Vidyanagar, Hubballi, Karnataka',
'Type 2 Diabetes'),

('Priya Nair', '9988776655', 'priya.nair@gmail.com', 38,
'Gokul Road, Hubballi, Karnataka',
'Vitamin D deficiency'),

('Arjun Reddy', '9123456780', 'arjun.reddy@gmail.com', 52,
'Deshpande Nagar, Hubballi, Karnataka',
'Blood pressure monitoring required'),

('Sneha Patil', '9345678901', 'sneha.patil@gmail.com', 29,
'Unkal, Hubballi, Karnataka',
'Iron deficiency'),

('Karthik Iyer', '9090909090', 'karthik.iyer@gmail.com', 61,
'Navanagar, Hubballi, Karnataka',
'Insulin dependent diabetic'),

('Meera Joshi', '9811122233', 'meera.joshi@gmail.com', 33,
'Akshay Colony, Hubballi, Karnataka',
'Calcium supplements advised'),

('Rohit Verma', '9765432109', 'rohit.verma@gmail.com', 48,
'Keshwapur, Hubballi, Karnataka',
'Cardiac medication ongoing'),

('Ananya Das', '9654321780', 'ananya.das@gmail.com', 26,
'Old Hubli, Hubballi, Karnataka',
'Vitamin B12 deficiency');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(100) DEFAULT NULL,
  `medicine_type` varchar(100) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `refill_days` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO medicines
(medicine_name, category, stock_quantity, expiry_date)
VALUES

('Dolo 650', 'Tablet', 120, '2027-08-15'),
('Paracetamol', 'Tablet', 90, '2027-05-10'),
('Amoxicillin 500mg', 'Capsule', 65, '2026-11-20'),
('Insulin Injection', 'Injection', 25, '2026-09-30'),
('Vitamin D3 Syrup', 'Syrup', 40, '2027-01-12'),
('Shelcal 500', 'Tablet', 75, '2027-06-18'),
('BP Monitor Strip', 'Medical Supply', 18, '2028-03-01'),
('Omeprazole', 'Capsule', 80, '2027-02-22'),
('Cough Syrup DX', 'Syrup', 30, '2026-12-14'),
('Disposable Syringe', 'Medical Equipment', 150, '2029-01-01'),
('Metformin 500mg', 'Tablet', 95, '2027-04-11'),
('Vitamin B12 Injection', 'Injection', 22, '2026-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `dosage_per_day` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `next_refill_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO prescriptions
(customer_id, prescription_date, doctor_name, notes)
VALUES

(1, '2026-05-01', 'Dr. Ramesh Kumar',
'Diabetes management prescription'),

(2, '2026-05-03', 'Dr. Anita Menon',
'Vitamin deficiency treatment'),

(3, '2026-05-04', 'Dr. Vivek Rao',
'BP medication refill monitoring'),

(4, '2026-05-05', 'Dr. Sameer Joshi',
'Nutritional supplement prescription'),

(5, '2026-05-06', 'Dr. Lakshmi Narayanan',
'Insulin and injection schedule'),

(6, '2026-05-07', 'Dr. Priyanka Shah',
'Bone health supplements'),

(7, '2026-05-08', 'Dr. Ajay Verma',
'Cardiac medication follow-up'),

(8, '2026-05-09', 'Dr. Soumya Das',
'Vitamin B12 treatment');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_items`
--

CREATE TABLE `prescription_items` (
  `item_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dosage_per_day` int(11) NOT NULL,
  `next_refill_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_items`
--

INSERT INTO prescription_items
(
    prescription_id,
    medicine_id,
    quantity,
    dosage_per_day,
    start_date,
    next_refill_date
)
VALUES

(1, 11, 30, 2, '2026-05-01', '2026-06-01'),
(1, 4, 2, 1, '2026-05-01', '2026-05-25'),
(1, 10, 10, 1, '2026-05-01', '2026-06-05'),

(2, 5, 1, 1, '2026-05-03', '2026-06-03'),
(2, 6, 20, 1, '2026-05-03', '2026-05-28'),

(3, 7, 15, 1, '2026-05-04', '2026-05-20'),
(3, 8, 30, 1, '2026-05-04', '2026-06-04'),

(4, 6, 15, 1, '2026-05-05', '2026-05-30'),
(4, 2, 10, 2, '2026-05-05', '2026-05-22'),

(5, 4, 4, 1, '2026-05-06', '2026-05-18'),
(5, 10, 20, 1, '2026-05-06', '2026-06-06'),

(6, 6, 30, 1, '2026-05-07', '2026-06-07'),
(6, 5, 2, 1, '2026-05-07', '2026-06-01'),

(7, 8, 30, 1, '2026-05-08', '2026-06-08'),
(7, 1, 15, 2, '2026-05-08', '2026-05-26'),

(8, 12, 3, 1, '2026-05-09', '2026-05-29'),
(8, 5, 1, 1, '2026-05-09', '2026-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `prescription_items`
--
ALTER TABLE `prescription_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `prescription_id` (`prescription_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prescription_items`
--
ALTER TABLE `prescription_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `prescriptions_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`);

--
-- Constraints for table `prescription_items`
--
ALTER TABLE `prescription_items`
  ADD CONSTRAINT `prescription_items_ibfk_1` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`prescription_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_items_ibfk_2` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`medicine_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
