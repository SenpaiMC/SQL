-- Créer la base de données
CREATE DATABASE mon_site;

-- Utiliser la base de données
USE mon_site;

-- Créer la table des utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    photo_profil VARCHAR(255),
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Créer la table des messages de contact
CREATE TABLE messages_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    sujet VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);