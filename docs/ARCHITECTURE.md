# Architecture

This is a Laravel-native application with a public Blade website and a reserved versioned API. Customer, Buyer and Admin portals, mobile consumers and external integrations are future scope. No business features or authentication screens exist yet.

## Boundaries

- Website controllers: `app/Http/Controllers/Website`.
- Future web portals: `app/Http/Controllers/{Customer,Buyer,Admin}`.
- Versioned API controllers: `app/Http/Controllers/Api/V1`, with actor subdirectories when needed.
- Form Requests: `app/Http/Requests/{Customer,Buyer,Admin,Api}`. Reuse a request across web/API when validation and authorization agree; do not duplicate rules merely to match a directory.
- API Resources: `app/Http/Resources/Api/V1`.
- Business services: `app/Services/{Customer,Buyer,Admin,Shared}`. Shared workflows belong in Shared rather than being copied between actors.
- Models, Actions, Jobs, Policies and Exceptions retain normal Laravel namespaces. Reserved empty directories contain only `.gitkeep`.

Web request → Form Request / authorization → controller → service → Eloquent → Blade.

API request → Form Request / authorization → controller → same service → Eloquent → API Resource.

Controllers select responses; services own calculations, business rules, transactions, integration coordination and job dispatch. Services accept validated data or DTO-like arrays, never HTTP request objects, and do not return views or HTTP responses. A static page may use `Route::view` without an artificial controller/service.

Models contain relationships, casts, scopes, accessors/mutators and lightweight model-specific behavior. Use Laravel-supported mass assignment protection consistently (the scaffold User uses Laravel 13's Fillable attribute). Actions are optional for genuinely reusable focused operations, not a required extra layer.

Use Eloquent directly in services for ordinary persistence. Introduce repositories only for a justified abstraction: complex reusable queries, reporting, multiple sources or external integrations. Do not add generic base repositories, service interfaces or third-party architecture packages speculatively.

## Identity and authorization

Retain one users table. Future roles and permissions must be designed from requirements; there are no role columns, role packages or seeded administrators yet. Sanctum's HasApiTokens trait and token migration prepare bearer authentication for future consumers. Protect future API endpoints with `auth:sanctum`; enforce actor/record access with policies, gates and middleware. Token abilities do not replace user authorization. Blade portals will use Laravel's session guard and CSRF protection. UI visibility is never sufficient authorization.

## Routing and frontend

`bootstrap/app.php` registers `routes/web.php`, `routes/api.php`, console routes and `/up`. API routes reserve the `/api/v1` prefix. Add customer.php, buyer.php and admin.php only when implementing those portals, registering them with Laravel's supported routing configuration and the web middleware group. Split API files only when their size warrants it.

Blade, Tailwind CSS and Vite are the frontend foundation. Blade controllers call services directly; do not call the application's API over HTTP. The supplied Stitch design will determine the actual UI later.

## Persistence and background work

MySQL is the default application connection; credentials are intentionally blank. File sessions/cache allow the public shell to boot before a database is configured. Database queues and Laravel's jobs, job_batches and failed_jobs migrations are ready for use after migration. Tests use isolated in-memory SQLite, array sessions/cache and synchronous queues.

Queue expensive email/notification delivery, PDFs, large uploads, imports, exports, external synchronization, long reports and image processing when implemented. Use after-commit dispatch for jobs relying on transactional writes. Document retries, timeouts, idempotency and failure handling with each workflow. Do not queue trivial work.

Avoid N+1 queries; eager load only required relationships, paginate large collections, index query paths, and chunk/cursor large datasets. Cache expensive read-heavy data only with an explicit invalidation strategy. Use transactions for related writes whose partial completion would violate invariants, not every single save.

## Foundation scope

This setup has no business inputs, business schema or business rules. Standard framework infrastructure migrations are retained. Static `/` and `/up` require no custom model, request, service or API Resource. `/api/v1` contains reserved groups but no business endpoints; unknown API paths return Laravel JSON 404s. Foundation tests use ephemeral routes to verify Sanctum and API middleware without introducing public demonstration endpoints.
