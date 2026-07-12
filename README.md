# PROJECT AKHIR - PEMROGRAMAN WEB CR001
# 🥗 ItsSumi - Sistem Rekomendasi Menu Gizi Balita Berbasis Web

## 👨‍🎓 Informasi Mahasiswa

| Keterangan | Data |
|------------|------|
| Nama | Iis Sumarni |
| NIM | 20240801095 |
| Program Studi | Teknik Informatika |
| Fakultas | Fakultas Ilmu Komputer |
| Universitas | Universitas Esa Unggul |
| Angkatan | 2024 |

---

## 📖 Deskripsi

**ItsSumi** merupakan sistem rekomendasi menu gizi balita berbasis web yang dirancang untuk membantu orang tua dalam menentukan menu makanan sesuai dengan kebutuhan gizi anak.

Sistem menggunakan metode **Rule Based Recommendation**, yaitu memberikan rekomendasi berdasarkan aturan yang telah ditentukan menggunakan data:

- Usia balita
- Jenis kelamin
- Berat badan
- Tinggi badan
- Alergi makanan
- Standar kebutuhan gizi Kementerian Kesehatan Republik Indonesia (Kemenkes RI)

Sistem akan menampilkan hasil analisis kondisi balita beserta rekomendasi menu makanan yang sesuai dengan kebutuhan gizinya.

---

# 🎯 Tujuan

Tujuan utama sistem adalah:

- Membantu orang tua memilih menu gizi balita.
- Memberikan rekomendasi makanan sesuai kebutuhan gizi.
- Mengurangi kesalahan dalam pemilihan makanan.
- Menjadi media edukasi mengenai pemenuhan gizi balita.

---

# ✨ Fitur Utama

## 👨‍👩‍👧 Pengguna

- Landing Page
- Form Input Data Balita
- Analisis Status Gizi
- Perhitungan AKG
- Filter Alergi Makanan
- Rekomendasi Menu
- Detail Menu
- Halaman Tentang Sistem

## 👨‍💻 Admin

- Login Filament
- Kelola Data Menu
- Kelola Kategori Usia
- Kelola Data Alergen
- Kelola Kandungan Gizi
- Upload Foto Menu

---

# 📸 Screenshot Sistem

## 🏠 Halaman Beranda

Halaman utama yang memberikan informasi mengenai sistem rekomendasi menu gizi balita dan menyediakan form input data anak.

![Landing Page](docs/images/landing-page.png)

---

## 📝 Form Input Data Balita

Pengguna mengisi data balita seperti nama, tanggal lahir, jenis kelamin, berat badan, tinggi badan, dan alergi makanan sebagai dasar proses rekomendasi.

![Form Input](docs/images/form-input.png)

---

## 📊 Hasil Analisis Gizi

Sistem menampilkan hasil analisis berupa status gizi, kebutuhan energi, kebutuhan protein, serta saran umum berdasarkan data yang telah dimasukkan.

![Hasil Analisis](docs/images/hasil-analisis.png)

---

## 🍽️ Rekomendasi Menu

Sistem memberikan rekomendasi menu utama dan menu selingan yang telah disesuaikan dengan kategori usia dan alergi makanan pengguna.

![Rekomendasi Menu](docs/images/rekomendasi-menu.png)

---

## ℹ️ Halaman Tentang

Halaman yang menjelaskan tujuan sistem, standar gizi yang digunakan, serta informasi mengenai metode rekomendasi.

![Tentang](docs/images/tentang.png)

---

## ⚙️ Dashboard Admin

Dashboard admin menggunakan Filament v3 untuk mengelola data menu, kategori usia, dan alergen.

![Dashboard Admin](docs/images/dashboard-admin.png)

---

# ⚙️ Metode

Sistem menggunakan metode:

> **Rule Based Recommendation**

Proses rekomendasi dilakukan dengan mencocokkan data balita terhadap aturan (rule) yang telah ditentukan.

Contoh aturan:

```text
IF Usia = 6-11 Bulan
THEN Tampilkan Menu Usia 6-11 Bulan

IF Alergi = Telur
THEN Jangan tampilkan menu yang mengandung telur
```

---

# 🛠 Tech Stack

| Teknologi | Keterangan |
|------------|------------|
| Laravel  | Backend Framework |
| Filament v3 | Admin Panel |
| Livewire | Reactive Component |
| Blade | Frontend Template |
| MariaDB | Database |
| Docker | Containerization |
| Nginx | Web Server |
| PHP 8.3 | Programming Language |
| GitHub | Version Control |
| VS Code | Code Editor |

---

# 📂 Struktur Database

Tabel utama yang digunakan:

- users
- menus
- kategori_usias
- alergens
- alergen_menu

---

# 👨‍💻 Login Admin

```
URL
/admin

Email
admin@example.com

Password
password
```

> Sesuaikan dengan akun admin yang digunakan pada project.

---

# 📸 Tampilan Sistem

### Landing Page

- Input data balita
- Informasi sistem
- Navigasi sederhana

### Hasil Analisis

- Status gizi
- Kebutuhan energi
- AKG
- Saran umum

### Rekomendasi Menu

- Menu utama
- Menu selingan
- Detail kandungan gizi
- Filter berdasarkan waktu makan

### Dashboard Admin

- Kelola Menu
- Kelola Kategori Usia
- Kelola Alergen

---

# 📚 Standar yang Digunakan

Sistem mengacu pada:

- Permenkes RI Nomor 28 Tahun 2019 tentang Angka Kecukupan Gizi (AKG)
- Permenkes RI Nomor 2 Tahun 2020 tentang Standar Antropometri Anak
- WHO Child Growth Standards (sebagai referensi pertumbuhan anak)

---

# ⚠️ Disclaimer

Sistem ini hanya digunakan sebagai media edukasi dan alat bantu rekomendasi menu gizi balita.

Hasil rekomendasi **tidak menggantikan konsultasi langsung dengan dokter, ahli gizi, maupun tenaga kesehatan profesional.**

---

