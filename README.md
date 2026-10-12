# Tugas 11 - E-Commerce DB + Secure Auth (Laravel)

Aplikasi Laravel berisi database e-commerce (7 tabel), Eloquent relationships,
autentikasi Breeze, multi-role (admin/editor/user), custom middleware, dan PostPolicy.

## Cara Menjalankan

```bash
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

Buka `http://127.0.0.1:8000/login`.

> Pengguna Windows (CMD): ganti `cp .env.example .env` dengan `copy .env.example .env`.

## Akun Uji

Password semua akun: `password`

| Role   | Email              |
|--------|--------------------|
| Admin  | admin@example.com  |
| Editor | editor@example.com |
| User   | user@example.com   |

## Hak Akses

| Halaman / Aksi            | Admin | Editor | User |
|---------------------------|-------|--------|------|
| /posts (lihat)            | Ya    | Ya     | Ya   |
| /posts/create (buat post) | Ya    | Ya     | Tidak (403) |
| /admin                    | Ya    | Tidak (403) | Tidak (403) |
| /editor                   | Ya    | Ya     | Tidak (403) |
| Edit/hapus post           | Semua | Milik sendiri | Tidak |

## Fitur

- 7 tabel dengan foreign key: users, categories, products, addresses, orders, order_items, posts
- Seeder: 6 kategori dan 60 produk
- Relationships Eloquent dan scope `active()`, `inStock()` pada Product
- Login, register, logout (Laravel Breeze)
- Custom middleware `role` dan `PostPolicy`
## Bukti Query Tinker

![Tinker 1](screenshots/tinker-1-hasmany.png)
![Tinker 2](screenshots/tinker-2-belongsto.png)
![Tinker 3](screenshots/tinker-3-scope-active.png)
![Tinker 4](screenshots/tinker-4-scope-instock.png)
![Tinker 5](screenshots/tinker-5-termahal.png)

## Bukti Tes Role

### Editor
![Editor posts](screenshots/editor-posts.png)
![Editor akses admin ditolak](screenshots/editor-admin-403.png)
![Editor halaman editor](screenshots/editor-halaman-editor.png)

### User
![User posts](screenshots/user-posts.png)
![User buat post ditolak](screenshots/user-create-403.png)
![User halaman editor ditolak](screenshots/user-editor-403.png)

### Admin
![Admin posts](screenshots/admin-posts.png)

### Tes Incognito 2 Role
![Incognito](screenshots/incognito-2-role.png)