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
    

)