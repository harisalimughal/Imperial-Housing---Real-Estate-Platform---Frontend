# Imperial Housing — Frontend

This README explains how to run the frontend locally for development.

Project layout (relevant):
- frontend/
  - public/            (static assets: CSS, JS, images)
  - src/
    - pages/           (PHP pages: `index.php`, `properties.php`, ...)
    - partials/        (header/footer includes)

The pages use root-relative asset paths like `/public/assets/...`. To run the site locally without editing paths, serve the `frontend` folder as the webserver document root.

---

## Option A — Quick: PHP built-in server (recommended)

Open PowerShell and run:

```powershell
# from repository root
cd F:\ImperialHousing
php -S localhost:8000 -t frontend
```

Then open in your browser:

- http://localhost:8000/src/pages/index.php
- http://localhost:8000/src/pages/properties.php

Notes:
- This preserves the current `/public/...` paths because the document root is `frontend/`.
- If `php` is not recognized, point to your PHP executable, e.g. `C:\php\php.exe -S localhost:8000 -t frontend`.
- If port 8000 is in use, change it (e.g. `:8080`).

---

## Option B — XAMPP / WAMP / Apache

1. Install XAMPP or WAMP.
2. Copy or symlink the `frontend` folder into Apache's document root.
   - XAMPP: `C:\xampp\htdocs\imperial-frontend`
   - WAMP: `C:\wamp64\www\imperial-frontend`
3. Start Apache from the control panel.
4. Open in browser:
   - http://localhost/imperial-frontend/src/pages/index.php

Alternatively, create an Apache virtual host pointing to `F:\ImperialHousing\frontend`.

---

## Optional: front-controller (open http://localhost:8000/)

If you prefer visiting `http://localhost:8000/` instead of `/src/pages/index.php`, create a small file at `frontend/index.php` with this content:

```php
<?php
// frontend/index.php
require __DIR__ . '/src/pages/index.php';
```

Then run the PHP server with `-t frontend` as shown above and open `http://localhost:8000/`.

---

## If you must serve `src/pages` as the document root

This is not recommended because pages use absolute `/public/...` references. To make `src/pages` work as docroot you must edit the asset links and partials to point back to `../../public/...`. I can update these for you automatically if needed.

---

## Troubleshooting

- `php` not found: add PHP to PATH or use the full path to `php.exe`.
- Missing CSS/images: ensure you started PHP with `-t frontend` (document root must be `frontend` so `/public` maps to `frontend/public`).
- Port in use: choose another port, e.g. `php -S localhost:8080 -t frontend`.
- PHP errors: check the PowerShell console for error messages when serving, and enable display_errors in `php.ini` for debugging.

---

If you want, I can:
- Add the `frontend/index.php` front-controller file for you.
- Or change all `/public/...` references to relative paths so you can run with `-t src/pages` (I recommend the front-controller instead).