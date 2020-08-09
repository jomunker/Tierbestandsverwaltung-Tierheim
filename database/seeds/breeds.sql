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



INSERT INTO `breeds` (`id`, `breed`, `species_id`, `created_at`, `updated_at`) VALUES
(5, 'Britisch Kurzhaar', 2, '2020-08-05 13:27:18', '2020-08-05 13:27:18'),
(10, 'Zwergwidder', 4, '2020-08-07 18:43:53', '2020-08-07 18:43:53'),
(11, 'Europäisch Kurzhaar', 2, '2020-08-09 12:56:12', '2020-08-09 12:56:12'),
(12, 'Löwenkopf', 4, '2020-08-09 13:34:14', '2020-08-09 13:34:14'),
(14, 'Golden Retriever', 17, '2020-08-09 16:02:40', '2020-08-09 16:02:40'),
(15, 'Mops', 17, '2020-08-09 16:09:46', '2020-08-09 16:09:46'),
(16, 'Labrador', 17, '2020-08-09 16:12:20', '2020-08-09 16:12:20');
