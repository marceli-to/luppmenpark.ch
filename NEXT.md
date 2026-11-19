# Luppmenpark – progress

## Done (2026-11-19)

- **Wohnungen** (`/wohnungen`, nav after Projekt): overview plan (`public/media/img/isometrie`,
  base + one overlay per house, aligned to the base) and table per house from the Mieterspiegel
  (`config/apartments.php`). Hover a row → its house lights up; hover/click a house → highlight /
  scroll to its rows. Mobile: compact list. No price → "auf Anfrage". «Bewerben» (Bewerbungsformular
  PDF) only for free units. Floor plans appear automatically as `public/downloads/grundrisse/<Nr>.pdf`.
- **Admin** (`/admin`): login, status frei / reserviert / vermietet, Mietzins, Wohnanteil.
  `php artisan apartments:seed` (re-runnable, keeps status and prices), `php artisan user:create`.
- **Home**: "Jetzt bewerben" badge → Wohnungen, «Alle Wohnungen» button under Beispielgrundrisse,
  Interessenten form moved to Kontakt (dropdown "Wohnen", `/kontakt?formular=wohnen`).
- **FAQ**: Baubeginn Frühling 2027, Einzug Frühling 2029.
- **Upgrade**: Laravel 10 → 13 (old app structure kept), PHPUnit 12, Vite 8; dropped Sanctum, Ray,
  Ignition, alpinejs (Livewire ships Alpine), axios, swiper. Contact forms now validate the email format.

## Deploy (staging / production)

Server needs **PHP 8.3+**.

```
composer install --no-dev
php artisan migrate --force
php artisan apartments:seed
php artisan user:create
php artisan optimize:clear
```

Check `.env`: `APP_DEBUG=false`, HTTPS with `SESSION_SECURE_COOKIE=true`.

## Next

- [ ] Client: intro text for Wohnungen (placeholder in `resources/views/pages/apartments.blade.php`)
- [ ] Client: floor plan PDFs per apartment → `public/downloads/grundrisse/<Nr>.pdf`
- [ ] Create admin logins for the client (`user:create`, passwords via `genpass`)
- [ ] Confirm server PHP version (8.3+) before deploying
- [ ] Later: Tailwind 4 and Fancybox 6 (both major rewrites, kept on v3 / v5 for now)
