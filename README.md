# Santosa Hospital Information System

## Overview

Santosa Hospital Information System merupakan aplikasi berbasis web yang mengintegrasikan REST API Hospital Information System.

Aplikasi ini dibuat menggunakan Laravel dan berfungsi untuk mengelola data pasien serta kunjungan pasien dengan mengikuti aturan bisnis dari API.

## Technology Stack

- Laravel 13
- PHP 8.4
- REST API
- Blade Template
- HTML
- CSS

## Features

### Dashboard

- Menampilkan ringkasan aktivitas rumah sakit
- Mengambil data dari API dashboard summary

### Patient Management

Fitur pasien:

- Menampilkan daftar pasien
- Search pasien
- Filter gender
- Filter blood type
- Tambah pasien
- Detail pasien
- Update pasien
- Delete pasien

### Visit Management

Fitur kunjungan:

- Menampilkan daftar kunjungan
- Filter status
- Filter unit
- Filter tanggal
- Tambah kunjungan
- Update status kunjungan
- Delete kunjungan

### Master Data Integration

Menggunakan API master data:

- Unit
- Doctor
- Diagnosis

### Visit Workflow

Status kunjungan mengikuti aturan API:
