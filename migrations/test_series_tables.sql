-- CS Test Series Landing Page Dynamic Tables
-- Run these queries in your database

-- Features Table
CREATE TABLE IF NOT EXISTS `feature_table` (
    `feature_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `icon` varchar(100) DEFAULT '<i class="fas fa-star"></i>',
    `sort_order` int(11) DEFAULT 0,
    `deleted` int(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Pricing/Packages Table
CREATE TABLE IF NOT EXISTS `pricing_table` (
    `pricing_id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `subtitle` varchar(255) DEFAULT '',
    `price` decimal(10,2) NOT NULL,
    `original_price` decimal(10,2) DEFAULT 0,
    `discount_note` varchar(255) DEFAULT '',
    `header_color` varchar(100) DEFAULT 'linear-gradient(135deg, #1ab79c 0%, #15967d 100%)',
    `features_html` text DEFAULT '',
    `link` varchar(255) DEFAULT 'type/subject/1',
    `sort_order` int(11) DEFAULT 0,
    `deleted` int(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`pricing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Testimonials Table
CREATE TABLE IF NOT EXISTS `testimonial_table` (
    `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `exam_info` varchar(255) DEFAULT '',
    `message` text NOT NULL,
    `rating` int(1) DEFAULT 5,
    `deleted` int(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- FAQs Table
CREATE TABLE IF NOT EXISTS `faq_table` (
    `faq_id` int(11) NOT NULL AUTO_INCREMENT,
    `question` varchar(500) NOT NULL,
    `answer` text NOT NULL,
    `sort_order` int(11) DEFAULT 0,
    `deleted` int(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default features
INSERT INTO `feature_table` (`title`, `description`, `icon`, `sort_order`) VALUES
('ICSI Pattern Questions', 'All test papers designed strictly following ICSI exam pattern and syllabus', '<i class="fas fa-graduation-cap"></i>', 1),
('Expert Evaluation', 'Answersheets evaluated by experienced faculty within 2-3 working days', '<i class="fas fa-user-check"></i>', 2),
('Detailed Analytics', 'Track progress with comprehensive performance reports and insights', '<i class="fas fa-chart-pie"></i>', 3),
('All India Ranking', 'Compare your performance with thousands of CS aspirants nationwide', '<i class="fas fa-ranking-star"></i>', 4),
('Exam Simulation', 'Mock tests that simulate actual exam conditions for better preparation', '<i class="fas fa-stopwatch"></i>', 5),
('Mobile Friendly', 'Access test series anytime, anywhere on any device', '<i class="fas fa-mobile-screen"></i>', 6);

-- Insert default pricing packages
INSERT INTO `pricing_table` (`name`, `subtitle`, `price`, `original_price`, `discount_note`, `header_color`, `features_html`, `link`) VALUES
('CS Executive', 'Complete Test Series', 2499, 4999, 'Limited Time Offer', 'linear-gradient(135deg, #1ab79c 0%, #15967d 100%)', '<div class="course-feature"><i class="fas fa-check"></i> Chapter-wise Tests</div><div class="course-feature"><i class="fas fa-check"></i> Full Mock Tests</div><div class="course-feature"><i class="fas fa-check"></i> Expert Evaluation</div><div class="course-feature"><i class="fas fa-check"></i> All India Ranking</div><div class="course-feature"><i class="fas fa-check"></i> Performance Analytics</div>', 'type/subject/1'),
('CS Professional', 'Advanced Test Series', 3499, 5999, 'Limited Time Offer', 'linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%)', '<div class="course-feature"><i class="fas fa-check"></i> Chapter-wise Tests</div><div class="course-feature"><i class="fas fa-check"></i> Full Mock Tests</div><div class="course-feature"><i class="fas fa-check"></i> Expert Evaluation</div><div class="course-feature"><i class="fas fa-check"></i> All India Ranking</div><div class="course-feature"><i class="fas fa-check"></i> Performance Analytics</div>', 'type/subject/2'),
('CS Combo', 'Executive + Professional', 4999, 9999, 'Save 50% - Best Value', 'linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%)', '<div class="course-feature"><i class="fas fa-check"></i> All CS Executive Tests</div><div class="course-feature"><i class="fas fa-check"></i> All CS Professional Tests</div><div class="course-feature"><i class="fas fa-check"></i> Expert Evaluation</div><div class="course-feature"><i class="fas fa-check"></i> All India Ranking</div><div class="course-feature"><i class="fas fa-check"></i> Priority Support</div>', 'type/subject/3');

-- Insert sample testimonials
INSERT INTO `testimonial_table` (`name`, `exam_info`, `message`, `rating`) VALUES
('Amit Sharma', 'CS Executive - Rank 15', 'The CS test series helped me identify my weak areas. Expert evaluation feedback was invaluable for my preparation.', 5),
('Priya Gupta', 'CS Professional - Cleared', 'All India ranking feature really pushed me to perform better. ICSI pattern questions were exactly like the real exam.', 5),
('Rahul Verma', 'CS Executive - Cleared', 'Best CS test series I have used. Detailed analytics helped me understand where I needed to focus more.', 5);

-- Insert sample FAQs
INSERT INTO `faq_table` (`question`, `answer`, `sort_order`) VALUES
('Why is My CS MTP the best CS Test Series?', 'My CS MTP offers expert-crafted papers, ICSI pattern questions, detailed performance analytics, All India ranking, and expert evaluation within 2-3 working days.', 1),
('What is included in the CS Test Series?', 'Our CS Test Series includes chapter-wise tests, full-length mock tests, previous year papers, expert evaluation, detailed explanations, and performance analytics.', 2),
('How does the expert evaluation work?', 'After submitting your answersheet, our expert faculty evaluates it within 2-3 working days with detailed feedback based on ICSI marking criteria.', 3),
('What is the validity period of the CS Test Series?', 'Your purchase will expire on conclusion of the attempt you are enrolling for or 6 months, whichever is earlier.', 4),
('Can I get All India ranking in the CS Test Series?', 'Yes, you get All India ranking after every test helping you understand your performance compared to other CS aspirants.', 5);
