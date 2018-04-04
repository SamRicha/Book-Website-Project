DROP DATABASE IF EXISTS books;
CREATE DATABASE IF NOT EXISTS books;
USE books;

CREATE TABLE book(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    genre VARCHAR(20),
    isbn VARCHAR(15),
    description VARCHAR(100)
);
    INSERT INTO book(name,author,genre,isbn,description)
    VALUES('Ulysses', 'James Joyce', 'Classic','23412234', 'One of the best books'),
    ('Manufacturing Consent', 'Noam Chomsky', 'Non-Fiction', '34534534', 'Another one of those best books');