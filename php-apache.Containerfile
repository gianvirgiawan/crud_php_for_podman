# Menggunakan base image php dengan apache 
FROM docker.io/library/php:8.2-apache

# Menginstal ekstensi mysqli agar PHP bisa terhubung ke MariaDB/MySQL 
RUN docker-php-ext-install mysqli

# Menginstal editor nano untuk penyesuaian file jika diperlukan 
RUN apt-get update && apt-get install -y nano