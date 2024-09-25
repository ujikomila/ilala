# ERD
![Screenshot 2024-09-25 110720](https://github.com/user-attachments/assets/23976ed3-6150-4ce4-8969-f01b458b5b7c)

# uml
![Screenshot 2024-09-25 101802](https://github.com/user-attachments/assets/08e45db0-f2df-48cf-8bb3-baee4b172794)
# 1. Prasyarat 
### Pastikan perangkat Anda telah memenuhi prasyarat berikut sebelum menginstal Repository ini:

- PHP: Versi 8.1 atau lebih baru.
- Composer: Dependency Manager untuk PHP.
- MySQL/SQLite: Untuk database.

# 2. Langkah Instalasi  

### Langkah 1: Clone Repository 
```
git clone https://github.com/ujikomila/ilala.git
``` 

### Langkah 2: Pindah ke Direktori Proyek 


```
cd ilala
```

- Setelah Itu Masuk Ke dalam Visual Studio Code


```
code .
```

### Langkah 3: Instal Dependensi Backend
```
composer install
```
### Langkah 4: Copy atau Salin File Konfigurasi (.env)

##### Salin file .env.example menjadi .env untuk mengatur variabel lingkungan atau Mengunkan Code berikut:

```
cp .env.example .env

```
### Langkah 5: Atur Konfigurasi .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ila_ujikom
DB_USERNAME=root
DB_PASSWORD=
DB_COLLATION=utf8mb4_unicode_ci
```

### Langkah 6: Migrasi Database

- Buat sebuah Databases Di xampp Terlebih Dahulu

```
php artisan migrate
```

### Langkah 7: Generate Application Key

- Langkah ini sangat penting untuk setiap aplikasi Laravel, karena tanpa kunci ini, beberapa fitur tidak akan berjalan sebagaimana mestinya jadi harus di jalankan ya perintanya kalo mau menggunakan Source Code ini ya semoga berhasil  :

```
php artisan key:generate
```

### Langkah 9: Jalankan Server Pengembang

```
php artisan serve
```
