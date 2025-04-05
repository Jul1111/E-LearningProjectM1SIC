
CREATE DATABASE IF NOT EXISTS JABL;
USE JABL;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE user_roles (
    user_id INT,
    role_id INT,
    PRIMARY KEY(user_id, role_id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(role_id) REFERENCES roles(id)
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE chapters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    FOREIGN KEY(course_id) REFERENCES courses(id)
);

CREATE TABLE quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chapter_id INT,
    title VARCHAR(255),
    is_final BOOLEAN DEFAULT FALSE,
    FOREIGN KEY(chapter_id) REFERENCES chapters(id)
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT,
    content TEXT NOT NULL,
    FOREIGN KEY(quiz_id) REFERENCES quizzes(id)
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    content TEXT NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,
    FOREIGN KEY(question_id) REFERENCES questions(id)
);

CREATE TABLE user_quiz_results (
    user_id INT,
    quiz_id INT,
    score INT,
    completed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(user_id, quiz_id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(quiz_id) REFERENCES quizzes(id)
);

CREATE TABLE user_progress (
    user_id INT,
    chapter_id INT,
    is_completed BOOLEAN DEFAULT FALSE,
    completed_at DATETIME,
    PRIMARY KEY(user_id, chapter_id),
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(chapter_id) REFERENCES chapters(id)
);
