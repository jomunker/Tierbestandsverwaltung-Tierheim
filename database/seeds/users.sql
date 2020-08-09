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



INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `admin`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin@tierverwaltung.de', NULL, '$2y$10$BgUPz1AjVm2KVJq/JyRt2eDeAM9xVt3VTJjzYz59WbnGigFPEKhE6', NULL, 1, '2020-08-09 14:14:06', '2020-08-09 14:14:06'),
(7, 'User', 'user@tierverwaltung.de', NULL, '$2y$10$FnRE4kKZjTojoojkoFhoQeWEU.cFHoEknHE3kKjBAQt3ZU75UbT2O', NULL, 0, '2020-08-09 14:14:34', '2020-08-09 14:14:34');
