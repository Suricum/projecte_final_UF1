CREATE DATABASE bddBiblioteques;
USE bddBiblioteques;

CREATE TABLE biblioteques  (

    id INT increment PRIMARY KEY,
    nom VARCHAR(),
    correu VARCHAR(),
    telefon VARCHAR()

);

CREATE TABLE llibres    (

    id INT increment PRIMARY KEY,
    nom VARCHAR(),
    autor VARCHAR(),
    isbn VARCHAR(),
    stock INT DEFAULT 0,
    biblioteca_id INT,
    FOREIGN KEY (biblioteca_id) REFERENCES biblioteques(id) ON DELETE SET NULL
    
);