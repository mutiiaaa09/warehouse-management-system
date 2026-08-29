# 🏢 Warehouse Management System (WMS) - Telkom

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)

> **Sistem Informasi Manajemen Gudang** berbasis web untuk perusahaan Telkom.  
> Kelola data barang, gudang, transaksi, dan laporan operasional secara terintegrasi.

---

## 📋 Fitur Utama

- 🔐 **Login Multi-Level** - Admin, Operator, dan Umum
- 📦 **Master Barang** - Tambah, edit, hapus data barang
- 🏗️ **Master Gudang** - Kelola data lokasi gudang
- 📊 **Transaksi** - Pencatatan barang masuk dan keluar
- 📑 **Laporan** - Daftar barang, gudang, dan rekap transaksi
- 👥 **Manajemen User** - Tambah user & reset password (khusus Admin)
- 🔒 **Keamanan** - Session-based authentication dengan MD5

---

## 🛠️ Teknologi

| Komponen | Teknologi |
|----------|-----------|
| **Backend** | PHP 7.4+ |
| **Database** | MySQL 5.7+ |
| **Frontend** | HTML5, CSS3, Bootstrap 5 |
| **Icons** | Bootstrap Icons |
| **Font** | Google Fonts (Inter) |
| **Server** | XAMPP / Laragon / Apache |

---

## 📁 Struktur Database

**Database:** `gudangkita`  
**Tabel:** `tuser`

```sql
CREATE TABLE tuser (
    id_login INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    nama_lengkap VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    level ENUM('Admin', 'Operator', 'Umum') NOT NULL
);
