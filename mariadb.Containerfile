# Menggunakan base image mariadb 
FROM docker.io/library/mariadb:latest

# Menyalin file .sql ke direktori inisialisasi database di dalam container.
# Skrip di direktori ini akan dieksekusi secara otomatis saat container pertama kali dibuat.
COPY init.sql /docker-entrypoint-initdb.d/