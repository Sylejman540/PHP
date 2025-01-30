CREATE TABLE IF NOT EXISTS `movies` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `movie_name` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `release_year` INT,
  `rating` DECIMAL(5,2)
);