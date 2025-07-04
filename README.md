Toko Online CodeIgniter 4
Proyek ini adalah platform toko online yang dibangun menggunakan CodeIgniter 4. Sistem ini menyediakan beberapa fungsionalitas untuk toko online, termasuk manajemen produk, keranjang belanja, sistem transaksi, dan sistem diskon.

Daftar Isi
Fitur
Persyaratan Sistem
Instalasi
Struktur Proyek
API Endpoints
Fitur
Fitur Utama Toko Online
Katalog Produk
Tampilan produk dengan gambar dan informasi detail
Sistem harga yang responsif dengan format currency Indonesia
Upload dan manajemen gambar produk
Keranjang Belanja
Tambah/hapus produk dari keranjang
Update jumlah produk dalam keranjang
Penghitungan otomatis subtotal dan total
Integrasi dengan sistem diskon untuk perhitungan harga akhir
Sistem Diskon
Manajemen diskon harian oleh admin
Penerapan diskon otomatis pada harga produk di keranjang
Validasi tanggal diskon untuk mencegah duplikasi
Tampilan info diskon di header untuk user yang login
Sistem Transaksi
Proses Checkout
Formulir pengisian alamat pengiriman
Integrasi dengan API RajaOngkir untuk perhitungan ongkos kirim
Pemilihan kelurahan dan layanan pengiriman
Kalkulasi total biaya termasuk ongkir dan diskon
Manajemen Transaksi
Penyimpanan detail transaksi ke database
Riwayat transaksi per user
Status tracking transaksi
Detail pembelian dengan informasi diskon yang diterapkan
Panel Admin
Manajemen Produk (CRUD)
Tambah, edit, hapus produk
Upload dan manajemen foto produk
Export data produk ke PDF dengan format professional
Manajemen Diskon
Tambah, edit, hapus data diskon harian
Validasi tanggal untuk mencegah duplikasi diskon
Interface yang user-friendly untuk manajemen diskon
Dashboard & Reporting
Dashboard eksternal untuk monitoring transaksi
Laporan transaksi dengan detail jumlah item
Export data dalam berbagai format
Sistem Autentikasi & Keamanan
User Management
Login/logout dengan validasi keamanan
Role-based access control (admin/guest)
Session management dengan data diskon
Security Features
CSRF protection
Password hashing dengan bcrypt
Input validation dan sanitization
Filter akses berdasarkan role user
API & Webservice
RESTful API
Endpoint untuk data transaksi
API key authentication
JSON response format
Integrasi dengan dashboard eksternal
UI/UX
Responsive Design
Template NiceAdmin yang mobile-friendly
Bootstrap-based interface
Consistent design language
User-friendly navigation
Persyaratan Sistem
PHP >= 8.2
Composer untuk dependency management
Web server (Apache/Nginx atau XAMPP untuk development)
MySQL database
Extension PHP yang diperlukan:
php-json
php-mbstring
php-mysql
php-xml
php-curl (untuk API RajaOngkir)
Instalasi
1. Clone Repository
bash
git clone [URL repository]
cd belajar-ci-tugas
2. Install Dependencies
bash
composer install
3. Konfigurasi Environment
Start module Apache dan MySQL pada XAMPP
Buat database db_ci4 di phpMyAdmin
Copy file .env dan konfigurasi database:
env
database.default.hostname = localhost
database.default.database = db_ci4
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
4. Setup Database
Jalankan migrasi untuk membuat tables:

bash
php spark migrate
Seed data awal:

bash
php spark db:seed ProductSeeder
php spark db:seed UserSeeder
php spark db:seed DiskonSeeder
5. Konfigurasi API Keys
Tambahkan ke file .env:

env
API_KEY = "random123678abcghi"
COST_KEY = "CtZvdcW026400a24e7cdcaaa8Lb*****"
6. Jalankan Aplikasi
bash
php spark serve
7. Akses Aplikasi
Frontend Toko: http://localhost:8080
Dashboard Eksternal: http://localhost:8080/dashboard-toko
Login credentials: Gunakan data dari UserSeeder (password: 1234567)
Struktur Proyek
Backend (MVC Architecture)
Controllers
app/Controllers/
├── AuthController.php          # Autentikasi & session management
├── ProdukController.php        # CRUD produk & export PDF
├── DiskonController.php        # Manajemen sistem diskon
├── TransaksiController.php     # Keranjang & checkout process
├── ApiController.php           # RESTful API endpoints
└── Home.php                    # Dashboard & profile management
Models
app/Models/
├── ProductModel.php            # Model produk dengan validasi
├── UserModel.php              # Model user & authentication
├── DiskonModel.php            # Model diskon dengan business logic
├── TransactionModel.php       # Model transaksi utama
└── TransactionDetailModel.php # Model detail transaksi
Views & Templates
app/Views/
├── layout.php                 # Template utama dengan sidebar
├── layout_clear.php           # Template minimal untuk login
├── components/
│   ├── header.php            # Header dengan info diskon
│   ├── sidebar.php           # Navigation menu
│   └── footer.php            # Footer component
├── v_home.php                # Katalog produk
├── v_produk.php              # Manajemen produk (admin)
├── v_diskon.php              # Manajemen diskon (admin)
├── v_keranjang.php           # Shopping cart interface
├── v_checkout.php            # Checkout dengan ongkir
├── v_profile.php             # User profile & history
└── v_login.php               # Login form
Frontend Assets
public/
├── img/                       # Upload folder untuk foto produk
├── NiceAdmin/                 # Template assets (CSS, JS, fonts)
└── dashboard-toko/            # Dashboard eksternal
    └── index.php              # Monitoring transaksi via API
Database Structure
Database Tables:
├── user                       # User accounts & roles
├── product                    # Product catalog
├── diskon                     # Daily discount system
├── transaction               # Main transaction records
└── transaction_detail        # Transaction line items
Configuration
app/Config/
├── Routes.php                # URL routing dengan filters
├── Database.php              # Database configuration
├── Filters.php               # Auth & redirect filters
└── App.php                   # Application settings
API Endpoints
Transaction API
Endpoint: GET /api
Authentication: API Key in header (Key: random123678abcghi)
Response: JSON format dengan data transaksi dan detail items
Usage: Dashboard eksternal untuk monitoring
External Integrations
RajaOngkir API: Untuk perhitungan ongkos kirim
Location API: Pencarian kelurahan/kota tujuan
Fitur Keamanan
CSRF Protection: Semua form dilindungi CSRF token
Input Validation: Validasi server-side untuk semua input
Role-based Access: Admin/guest access control
Password Security: Bcrypt hashing untuk password
API Authentication: Key-based authentication untuk API
Development Notes
Menggunakan CodeIgniter 4 framework dengan struktur MVC
External library: Cart untuk shopping cart management
PDF generation menggunakan DOMPDF
Bootstrap 5 untuk responsive UI
jQuery untuk interaktivity dan AJAX calls
