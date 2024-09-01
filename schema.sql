DROP DATABASE IF EXISTS `super_movies`;
CREATE DATABASE `super_movies` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `super_movies`;

CREATE TABLE `admin` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `subscription_status` ENUM("active", "inactive") DEFAULT "inactive",
  `subscription_id` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `subscriptions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `plan` ENUM("monthly", "yearly") NOT NULL,
  `status` ENUM("active", "inactive", "canceled") DEFAULT "active",
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

CREATE TABLE `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `description` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `movies` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `description` TEXT NOT NULL,
  `release_date` DATE NOT NULL,
  `duration` INT NOT NULL,
  `category_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
);

CREATE TABLE `movie_categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `movie_id` INT NOT NULL,
  `category_id` INT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`movie_id`) REFERENCES `movies`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE
);

CREATE TABLE `watch_history` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `movie_id` INT NOT NULL,
  `watched_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`movie_id`) REFERENCES `movies`(`id`) ON DELETE CASCADE
);

CREATE TABLE `sessions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `session_token` VARCHAR(255) NOT NULL,
  `expires_at` TIMESTAMP,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

CREATE TABLE `audit_logs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `action` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

INSERT INTO `admin` (`name`, `email`, `password_hash`) VALUES ("Admin", "admin@admin.com", "$2y$10$Pg5Y3XChxPTX6Mgt8mXD3O9imYYia2w7l8DVG2RgHx.nDjYchgEYW");

INSERT INTO `categories` (`name`, `description`) VALUES ("Action", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Adventure", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Comedy", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Drama", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Science fiction", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Fantasy", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Suspense", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Terror", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Romance", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Animation", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Musical", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Documentary", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("War", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Western", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Police officer", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Mystery", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Biography", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("History", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Sport", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Family", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Children's", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Crime", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Cult", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Superhero", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Noir", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Epic", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Psychological Thriller", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Apocalyptic/Post-Apocalyptic", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Martial arts", "Lorem Ipsum is simply dummy text of the printing and typesetting industry."),
                                                        ("Experimental Cinema", "Lorem Ipsum is simply dummy text of the printing and typesetting industry.");