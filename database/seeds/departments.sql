-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 09. Aug 2020 um 22:33
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



INSERT INTO `departments` (`id`, `department`, `contact_name`, `contact_surname`, `contact_telefon`, `created_at`, `updated_at`) VALUES
(1, 'Hunde', 'Sally', 'Müller', '0981/12345-1', '2020-08-05 19:37:37', '2020-08-05 18:24:06'),
(2, 'Katzen', 'Lena', 'Maurer', '0981/12345-2', '2020-08-05 19:40:43', '2020-08-09 14:40:44'),
(3, 'Kleintiere', 'Matthias', 'Schmied', '0981/12345-3', '2020-08-05 19:42:05', '2020-08-09 14:41:27'),
(8, 'Vögel', 'Bettina', 'Weiß', '0981/12345-4', '2020-08-05 19:44:21', '2020-08-06 21:37:11');
