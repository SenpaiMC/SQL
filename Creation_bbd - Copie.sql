-- Créer la base de données
CREATE DATABASE mon_site;

-- Utiliser la base de données
USE mon_site;

-- Créer la table des utilisateurs
CREATE TABLE series (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    cover VARCHAR(255),
    type VARCHAR(255)NOT NULL,
    genre VARCHAR(255)NOT NULL,
    synopsie VARCHAR(255)NOT NULL,
    upload_chap VARCHAR 
);
