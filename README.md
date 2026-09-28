# Papina Farms application

Laravel foundation for a public Blade website, with reserved structure for Customer, Buyer and Admin portals, a versioned REST API, and future mobile/external consumers. The public website extends the supplied Stitch theme across seven pages, with company information verified against the stakeholder profile. Business workflows, login screens and role schema are not implemented.

## Stack

- Laravel 13, PHP 8.4+ for this project's locked dependencies (Laravel itself supports PHP 8.3+).
- Blade, Tailwind CSS 4, Vite 8 and Laravel's Vite plugin; Node.js 22.12+ (verified with Node 24).
- MySQL-ready configuration, Laravel Sanctum 4, standard database queues.
- PHPUnit 12, Laravel Pint, framework factories and test helpers.
- Standard scaffold development tools: Tinker, Pail, Pao, Mockery, Faker and Collision. No frontend framework or admin/architecture package.

Exact package versions are pinned in composer.lock and package-lock.json.

## Local setup

Install PHP 8.4+ with Composer and required Laravel extensions, including pdo_mysql. Tests also need pdo_sqlite. Install Node.js and npm. Ensure PHP is on PATH; with Windows Herd, select PHP 8.4+ and use a Herd-enabled terminal. This workspace was verified with Herd PHP 8.4.25.

```sh
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
php artisan test
php artisan serve
```

In PowerShell, use `Copy-Item .env.example .env` instead of `cp` if preferred, and `npm.cmd` if the shell blocks npm.ps1. Copy the environment and generate a key only for a fresh installation; do not overwrite an existing environment or rotate an existing key during routine setup. `composer setup` is a first-install convenience command that installs dependencies, creates a missing environment, generates a key and builds assets; it deliberately does not migrate a database.

Open http://localhost:8000, or let Herd serve the repository's public directory. All seven public pages use the supplied theme, local imagery and self-hosted fonts. File sessions/cache allow it to boot before MySQL is configured.

Create a local MySQL database named papinafarms, set DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME and DB_PASSWORD in your ignored .env, then run:

```sh
php artisan migrate
php artisan queue:work
```

No MySQL credentials are supplied and no application database has been migrated by this setup. Migrations were exercised only in isolated SQLite tests. Configure MySQL before running workers or database-dependent features. The default seeder creates no demo users or business records.

Use `php artisan serve` and `npm run dev` in separate terminals for frontend work. After configuring MySQL, `composer dev` starts Laravel's scaffold development processes. For deployment, build assets, set APP_ENV=production and APP_DEBUG=false, configure APP_URL and service credentials securely, run migrations, and supervise queue workers when jobs exist. Never regenerate an established production key as part of deployment. Multi-instance deployments need shared cache/session infrastructure.

## Architecture and workflow

Controllers remain thin; Form Requests validate; services contain HTTP-independent business workflows; models handle persistence; API Resources control serialized output. Blade and API controllers reuse services directly. Repositories are introduced only for a demonstrated abstraction need. Shared users are retained; roles/permissions await requirements.

Every major module starts with the feature template and follows:

```text
Requirements / Flow -> Migration -> Model -> Form Request -> Service
-> Controller -> API Resource -> Routes -> Tests -> Blade frontend
```

Record genuinely inapplicable steps. Understand backend rules and tests before UI work. Enforce server-side authorization, protect mass assignment, use transactions for related writes, paginate/eager load appropriately and queue expensive work where needed.

```text
app/
  Http/
    Controllers/{Website,Customer,Buyer,Admin,Api/V1/{Customer,Buyer,Admin}}
    Requests/{Customer,Buyer,Admin,Api}
    Resources/Api/V1/
  Models/User.php
  Services/{Customer,Buyer,Admin,Shared}
  Actions/  Jobs/  Policies/  Exceptions/
resources/
  views/{layouts,components,partials,pages}
  css/app.css
  js/app.js
routes/
  web.php
  api.php
  console.php
tests/
  Feature/{Api/V1,Customer,Buyer,Admin}
  Unit/Services/
docs/
  templates/FEATURE_TEMPLATE.md
```

Empty reserved directories contain only .gitkeep. Add portal route files when their portals are implemented.

## Routes and API readiness

- GET /: named website.home, public homepage.
- GET /about-us: named website.about, company information.
- GET /farmers-membership: named website.membership, eligibility, registration guidance and supporting-document checklist.
- GET /what-we-do: named website.services, services and enterprise areas.
- GET /markets-partners: named website.markets, markets and partnership opportunities.
- GET /resources: named website.resources, company profile and information links.
- GET /contact-us: named website.contact, verified head office and enquiry details.
- GET /up: framework health response.
- GET /sanctum/csrf-cookie: Sanctum infrastructure.
- Framework signed local-storage routes remain at their scaffold defaults.
- routes/api.php is registered with `/api`, and reserves `/v1` plus customer/buyer/admin groups. Empty groups produce no route:list entries; there are no API business, login or profile endpoints. Unknown API paths return JSON 404s.

Sanctum configuration, its personal_access_tokens migration and User's HasApiTokens trait are ready. Future private APIs require auth:sanctum plus server-side authorization. API middleware has a native 60 requests/minute user/IP limiter. No SPA middleware is enabled; Blade uses ordinary session/CSRF handling. Test-only protected endpoints verify bearer authentication without exposing a demonstration API.

## Commands and verification

```sh
php artisan --version
php artisan route:list
php artisan test
php vendor/bin/pint --test
npm run dev
npm run build
```

Build before running the foundation tests: the public-page test verifies actual Vite asset tags. For reproducible frontend installation use npm ci. Tests use in-memory SQLite, array cache/sessions/mail and synchronous queues; they do not access the local MySQL database. MySQL-specific integration checks remain necessary when database features arrive.

## Git and secrets

Commit source, migrations, documentation, .env.example and both lockfiles. Never commit .env variants, credentials, private keys, auth.json, vendor, node_modules, generated frontend assets, runtime storage files or IDE settings. The local .env contains a generated key; .env.example has a blank key and blank database credentials. No foundation commit is created automatically.

## Documentation

- [AI repository instructions](AGENTS.md)
- [Architecture](docs/ARCHITECTURE.md)
- [Development workflow](docs/DEVELOPMENT_WORKFLOW.md)
- [API standards](docs/API_STANDARDS.md)
- [Database standards](docs/DATABASE_STANDARDS.md)
- [Frontend standards](docs/FRONTEND_STANDARDS.md)
- [Testing standards](docs/TESTING_STANDARDS.md)
- [Feature template](docs/templates/FEATURE_TEMPLATE.md)

## Website design and pending content

The reference files live in `inspo/`. See [public website requirements](docs/features/public-website.md) for design decisions and verification. Shared Blade navigation and footer use Tailwind tokens extracted from the templates, with responsive layouts down to 320px. `public/images` contains optimized WebP versions of supplied images and template portraits; `public/fonts` contains the reference Google Fonts (Inter, Plus Jakarta Sans and a subset of Material Symbols Outlined). No runtime CDN is required.

The stakeholder company profile supplied in `secure_docs/` is the source of truth for company copy. A public copy is available through the Resources page; the original remains unchanged. Contact details live in `config/company.php` and are shared across the site. Unsupported template statistics, named leadership, certifications, fictional news and membership guarantees have been removed. Priority stakeholders are distinguished from confirmed partners.

The official membership registration form is still pending. There is no online application, account portal or contact-form submission in this release; enquiry links open email or telephone applications. See [company-profile page requirements](docs/features/company-profile-pages.md) for sources, behavior and verification.
