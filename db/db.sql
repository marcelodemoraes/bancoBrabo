drop database if exists bancobrabo;
create database bancobrabo;
use bancobrabo;

drop table if exists User;
create table User (
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role BOOLEAN NOT NULL,
    name VARCHAR(50) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

drop table if exists Account;
create table Account (
    id INT NOT NULL AUTO_INCREMENT,
    balance FLOAT(2) NOT NULL,
    accountNumber VARCHAR(255) NOT NULL UNIQUE,
    userId INT NOT NULL UNIQUE,
    PRIMARY KEY (id),
    FOREIGN KEY (userId) REFERENCES User(id)
);

drop table if exists Transactions;
create table Transactions (
    id INT NOT NULL AUTO_INCREMENT,
    userFrom INT NOT NULL,
    userTo INT NOT NULL,
    amount FLOAT(2) NOT NULL,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (userFrom) REFERENCES User(id),
    FOREIGN KEY (userTo) REFERENCES User(id)
);
