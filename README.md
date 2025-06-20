# 🚀 Aplikasi Pemesanan Tiket Bioskop

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)
![Podman](https://img.shields.io/badge/Podman-892CA0?style=for-the-badge&logo=podman&logoColor=white)
![YAML](https://img.shields.io/badge/YAML-CB171E?style=for-the-badge&logo=yaml&logoColor=white)

Proyek aplikasi CRUD (Create, Read, Update, Delete) sederhana yang dibangun menggunakan PHP dan database MariaDB. Seluruh aplikasi ini dikemas dalam container dan diorkestrasi menggunakan Podman dan `podman-compose`.

---

## ✨ Fitur

- **Create**: Menambah data mata kuliah baru ke dalam database.
- **Read**: Menampilkan seluruh daftar mata kuliah yang ada.
- **Update**: Mengubah informasi mata kuliah yang sudah ada.
- **Delete**: Menghapus data mata kuliah dari database.

---

## 🛠️ Teknologi yang Digunakan

- **Aplikasi Web**: PHP 8.2
- **Web Server**: Apache
- **Database**: MariaDB
- **Container Engine**: Podman v4.9.3
- **Orkestrasi**: `podman-compose` 1.0.6
- **Manajemen Database**: PhpMyAdmin

---

## 📂 Struktur Direktori

```
/crud_php_for_podman
|-- src/                      # Berisi semua file kode aplikasi PHP
|   |-- index.php             # Halaman utama (Read)
|   |-- tambah.php            # Halaman tambah data (Create)
|   |-- edit.php              # Halaman edit data (Update)
|   |-- hapus.php             # Script penghapus data (Delete)
|   |-- koneksi.php           # Script koneksi ke database
|-- init.sql                  # Script inisialisasi database (DDL & DML)
|-- php-apache.Containerfile  # Script build untuk image PHP-Apache
|-- mariadb.Containerfile     # Script build untuk image MariaDB
|-- compose.yml               # File utama untuk orkestrasi semua layanan
└── README.md                 # Dokumentasi ini
```

---

## ⚙️ Prasyarat

- **Podman**
- **`podman-compose`** (bisa diinstal via `pip` atau manajer paket sistem seperti `apt` atau `dnf`)

---

## 🚀 Instalasi dan Konfigurasi

1.  **Clone Repositori**

    ```bash
    git clone https://github.com/gianvirgiawan/crud_php_for_podman
    cd crud_php_for_podman
    ```

2.  **Konfigurasi Variabel Lingkungan (Opsional)**
    Anda dapat mengubah kredensial database, nama database, atau port di dalam file `compose.yml` pada bagian `environment`. Pastikan untuk menyamakan perubahan antara service `mariadb` dan `php-apache`.

3.  **Penyesuaian untuk Red Hat/CentOS/Fedora (PENTING)**
    Jika Anda menjalankan proyek ini di sistem operasi yang menggunakan SELinux (seperti Red Hat), Anda **wajib** mengedit file `compose.yml` untuk memberikan izin akses volume pada container.

    Ubah bagian `volumes` pada service `php-apache` menjadi seperti ini:

    ```yaml
    # ... di dalam service php-apache-namapanggilan
    volumes:
      - ./src:/var/www/html:z
    ```

    Penambahan `:z` akan secara otomatis mengatur konteks keamanan SELinux yang benar.

---

## 🏃 Menjalankan Aplikasi

1.  **Jalankan Semua Layanan**
    Buka terminal di direktori utama proyek dan jalankan perintah:

    ```bash
    podman-compose up -d
    ```

    Perintah ini akan membangun image yang diperlukan dan menjalankan semua container di latar belakang.

2.  **Verifikasi Container**
    Pastikan ketiga container berjalan dengan baik:
    ```bash
    podman ps
    ```
    Jika berhasil, container `mariadb`, `php-apache`, dan `phpmyadmin` dengan status `Up`.

---

## 🌐 Mengakses Aplikasi

Setelah semua container berjalan, Anda bisa mengakses layanan melalui browser:

- **Aplikasi Web CRUD**:

  - **URL**: `http://localhost:8000` (atau `http://<IP_Server_Anda>:8000`)
  - Halaman ini akan menampilkan daftar mata kuliah awal dari database.

- **PhpMyAdmin**:
  - **URL**: `http://localhost:8001` (atau `http://<IP_Server_Anda>:8001`)
  - **Server**: Nama service database Anda (contoh: `mariadb-gian`)
  - **Username**: Sesuai `MYSQL_USER` di `compose.yml`
  - **Password**: Sesuai `MYSQL_PASSWORD` di `compose.yml`

### 🔥 Khusus untuk Pengguna Red Hat

Jangan lupa untuk membuka port di firewall Anda agar aplikasi bisa diakses dari luar VM:

```bash
sudo firewall-cmd --add-port=8000/tcp --permanent
sudo firewall-cmd --add-port=8001/tcp --permanent
sudo firewall-cmd --reload
```

---

## 🛑 Menghentikan Aplikasi

Untuk menghentikan semua layanan yang berjalan:

```bash
podman-compose down
```

Perintah ini akan menghentikan dan menghapus container, tetapi tidak akan menghapus data database Anda karena disimpan di volume persisten.

---

## 🗑️ Menghapus Data (Reset Database)

Jika Anda ingin menghapus semua data dan memulai dari awal (misalnya setelah mengubah kredensial database), ikuti langkah berikut:

1.  Hentikan semua layanan:
    ```bash
    podman-compose down
    ```
2.  Verifikasi volume ada atau tidak:
    ```bash
    podman volume ls
    ```
3.  Hapus volume data MariaDB (ganti `myapp_mariadb_data` dengan nama proyek Anda jika berbeda):
    ```bash
    podman volume rm myapp_mariadb_data
    ```
4.  Jalankan kembali aplikasi. Ini akan memaksa inisialisasi ulang database.
    ```bash
    podman-compose up -d
    ```

---

## Thanks

---
