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



INSERT INTO `species` (`id`, `species`, `department_id`, `created_at`, `updated_at`) VALUES
(2, 'Katze', 2, '2020-07-28 20:22:04', '2020-08-09 14:42:02'),
(4, 'Kaninchen', 3, '2020-07-28 20:32:20', '2020-08-07 11:26:19'),
(17, 'Hund', 1, '2020-08-09 15:58:57', '2020-08-09 15:58:57');
