-- EssayIQ database schema for MySQL/MariaDB.
-- Import this file with phpMyAdmin or the mysql command-line client.

CREATE DATABASE IF NOT EXISTS `essayiq`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `essayiq`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(190) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('student', 'instructor', 'admin') NOT NULL DEFAULT 'student',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `assignments` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `instructor_id` INT NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `description` TEXT NOT NULL,
    `instructions` TEXT DEFAULT NULL,
    `due_date` DATETIME DEFAULT NULL,
    `max_score` INT NOT NULL DEFAULT 100,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_assignments_instructor_id` (`instructor_id`),
    CONSTRAINT `fk_assignments_instructor`
        FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `submissions` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `student_id` INT NOT NULL,
    `assignment_id` INT NOT NULL,
    `essay_text` LONGTEXT NOT NULL,
    `submitted_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` VARCHAR(30) NOT NULL DEFAULT 'Pending',
    `grade` DECIMAL(5,2) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `idx_submissions_student_id` (`student_id`),
    KEY `idx_submissions_assignment_id` (`assignment_id`),
    CONSTRAINT `fk_submissions_student`
        FOREIGN KEY (`student_id`) REFERENCES `users` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `fk_submissions_assignment`
        FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `password_resets` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `token_hash` CHAR(64) NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `used_at` DATETIME DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `attempts` INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_password_resets_token_hash` (`token_hash`),
    KEY `idx_password_resets_user_id` (`user_id`),
    CONSTRAINT `fk_password_resets_user`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
