# Testing standards

Use Laravel's standard PHPUnit suite: `php artisan test` or `composer test`. Use `php artisan test --filter=TestName` for a focused check. Run `php vendor/bin/pint --test` for PHP formatting and `npm run build` for asset compilation.

Feature tests are the default for HTTP/API behavior. Place versioned API tests under `tests/Feature/Api/V1` and future portal tests under Customer, Buyer and Admin. Use `tests/Unit/Services` for isolated business logic only when useful. Avoid tests that merely restate implementation or fake features created only for coverage.

Significant modules must cover, as applicable:

- Successful operations and expected database changes.
- Validation errors and Laravel's API error structure.
- Missing/invalid authentication and forbidden access, including record ownership boundaries.
- Missing records and business-rule failures, with correct status codes.
- Resource response fields, pagination and absence of sensitive attributes.
- Transaction rollback, queued work and integration failures where behavior depends on them.

Use factories and RefreshDatabase for persistence tests. Test queues/notifications/mail using Laravel fakes when verifying dispatch; test isolated job behavior separately where needed. Sanctum's actingAs helper is suitable for endpoint authorization tests, but also verify real bearer token handling when configuring authentication.

`phpunit.xml` uses in-memory SQLite, array cache/session, synchronous queues and array mail. Database tests never use the application's configured MySQL database. Keep environmental overrides explicit and never point tests at production. Future MySQL-specific queries/migrations require checks against a dedicated MySQL test instance.

Foundation coverage verifies the public shell and health route, JSON API errors, API middleware/version grouping via test-only routes, rate limiting, and Sanctum's unauthenticated/valid/invalid/revoked token behavior. These temporary routes exist only inside tests. Build assets before the site test so the actual Vite integration is exercised.

Backend rules and tests must be understood before Blade implementation, and backend tests must pass before the frontend is considered complete. Document any inapplicable cases in the feature requirements.
