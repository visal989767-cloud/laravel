# UMVISAL-SV34 — Laravel 13 Midterm Project

This folder is a real Laravel 13 project skeleton with all the controllers, models,
migrations, views, and routes required by the midterm exam already added.

The `vendor/` folder (Composer dependencies) and `node_modules/` are **not** included
because they must be downloaded on your own machine (this sandbox has no internet
access to Packagist/npm registries). Follow the steps below to get it running.

## 1. Install dependencies

```bash
cd UMVISAL-SV34
composer install
npm install
```

## 2. Configure the app key

```bash
php artisan key:generate
```

(`.env` is already included and pre-configured for MySQL — see below.)

## 3. Create the MySQL database

Open MySQL / phpMyAdmin / Deforce and create a database named:

```
umvisal_sv34
```

`.env` already has:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=umvisal_sv34
DB_USERNAME=root
DB_PASSWORD=
```

Update the username/password if your local MySQL differs.

## 4. Run migrations

```bash
php artisan migrate
```

This creates: `students`, `products`, `teachers`, `categories`, `employees`,
plus Laravel's default `users`, `cache`, `jobs` tables.

## 5. Insert sample data (Section VI.3)

Run the statements in `database/insert_data.sql` against your database
(via Deforce, phpMyAdmin, or the `mysql` CLI):

```bash
mysql -u root -p umvisal_sv34 < database/insert_data.sql
```

## 6. Run the project

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000`.

## Deploy to Vercel

This project uses Vercel's container runtime with FrankenPHP. Push the project
to a Git provider, import the repository in Vercel, and keep the project root
as the Vercel Root Directory. The root `Dockerfile`, `Caddyfile`, and
`vercel.json` configure the Laravel web service.

Before deploying:

1. Create a production MySQL database reachable from Vercel. Do not use the
   local database host or credentials from `.env`.
2. Generate an application key with `php artisan key:generate --show`.
3. Add these values in Vercel under **Project Settings > Environment Variables**
   for Production (and separately for Preview if needed):
   `APP_KEY`, `APP_URL`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`,
   and `DB_PASSWORD`. Set `APP_URL` to the deployed HTTPS URL.
4. Deploy with Vercel's Git integration or `vercel deploy --prod`.
5. Run `php artisan migrate --force` once against the production database from
   a trusted release environment after setting its database variables and
   before sending production traffic. This also creates the database-backed
   session and cache tables. Do not run migrations when each container starts.

Sessions and cache use the external database so employee session state is
shared between instances. Queued work runs synchronously; configure an external
queue before relying on background jobs. The container filesystem is
ephemeral, so store uploads in external object storage. Production logs are
sent to Vercel's runtime logs.

## Routes to test (per exam sections III–V)

| Section | URL |
|---|---|
| III | `/product/listproduct` → "Welcome to List Product Form" |
| III | `/product/addproduct` → "Add Product Information" |
| III | `/category/show` → "Welcome to List Category Form" |
| III | `/category/create` → "Add Category Information" |
| IV  | `/student/info/allstudent` → StudentController@show → "Welcome to List Student Form" |
| IV  | `/product/create` → StudentController@create → "Welcome to Add Student Form" |
| V   | `/employee/home` → clickable employee list |
| V   | `/employee/detial/101/John/Manager` → Employee Detail page with empid, empname, position |

## Project structure highlights

- `app/Models/` — Student, Teacher, Product, Category, Employee
- `app/Http/Controllers/` — StudentController, TeacherController, ProductController,
  CategoryController, EmployeeController
- `database/migrations/` — students & products tables built exactly to spec (Section VI),
  plus supporting teachers/categories/employees tables
- `database/insert_data.sql` — sample INSERT statements (Section VI.3)
- `resources/views/` — home, index, student/, product/, category/, employee/, teacher/
- `routes/web.php` — all routes from Sections III, IV, V
