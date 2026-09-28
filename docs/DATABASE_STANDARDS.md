# Database standards

Use migrations for all schema changes. Never ask developers to manually alter production tables. Application configuration defaults to MySQL; fill local connection details in the ignored `.env` and create the database before running `php artisan migrate`. Do not commit credentials or alter production databases during local setup.

The foundation retains Laravel's users/password_reset_tokens/sessions, cache/cache_locks, jobs/job_batches/failed_jobs and Sanctum personal_access_tokens migrations. These are infrastructure only. No business tables, role schema or demo records are created. The default seeder is intentionally empty.

- Use foreign keys for real relationships, choosing delete behavior explicitly.
- Add indexes for common filtering, joining and ordering paths; use unique constraints for true uniqueness rather than relying only on validation.
- Make columns nullable only where null has business meaning. Include timestamps when appropriate; use soft deletes only with a documented retention/recovery need.
- Choose decimal precision for monetary/decimal data and use suitable casts. Use boolean, date/datetime, array/json and enum casts when applicable.
- Keep models focused on relationships, scopes, casts, accessors/mutators and lightweight behavior. Protect mass assignment and pass only validated, authorized fields.
- Use `DB::transaction` for related writes whose partial completion would create invalid state. Consider race conditions and locking for future inventory/payment-like invariants. Do not add transactions around every isolated save.
- Dispatch jobs after commit when they depend on transaction data. External side effects are not rolled back by database transactions; document retries/idempotency and failure recovery.
- Eager load required relationships, paginate lists, chunk or cursor large datasets, and inspect query patterns before adding caches or abstractions.

Before rollout, consider existing data, migration ordering, backups and reversibility. Do not assume a destructive down migration is safe in production. Test migrations and persistence locally; use isolated SQLite tests for speed and validate MySQL-specific behavior against a dedicated MySQL test database when introduced. SQLite tests do not establish MySQL compatibility by themselves.
