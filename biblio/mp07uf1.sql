-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Servidor: 127.0.0.1
-- Base de datos: `mp07uf1`

CREATE DATABASE IF NOT EXISTS mp07uf1;
USE mp07uf1;

CREATE TABLE `llibre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titol` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `idioma` varchar(3) NOT NULL,
  `id_biblioteca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `llibre-biblioteca` (`id_biblioteca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `biblioteca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `direccio` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `llibre`
  ADD CONSTRAINT `llibre-biblioteca` FOREIGN KEY (`id_biblioteca`) REFERENCES `biblioteca` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

