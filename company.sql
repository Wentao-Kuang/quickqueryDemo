CREATE TABLE company (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    clientId VARCHAR(100) UNIQUE,
    clientSecret VARCHAR(100) UNIQUE, 
    redirectUri VARCHAR(100) UNIQUE
);

INSERT INTO company (name, clientId, clientSecret, redirectUri) 
VALUES('SandBoxTest','Q01lWY4aO3gLmkrv8nYUreXqztwuqsxjZbhvFqwILirf5eUnMF','GDYNzCYiOiFNWw3ytHtzHpedfIC2lO5cxbrHBR2W','http://localhost:8080?action=oauth_callback');

CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100) NOT NULL
);

INSERT INTO user (name, email, password) 
VALUES('Wentao Kuang','wt.kuang@icloud.com','admin');
