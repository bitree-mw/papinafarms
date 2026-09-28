# Repository instructions

Read this file and the relevant `docs/` standards before changing application code.

1. Follow existing Laravel conventions. Keep the application Laravel-native; justify any new architecture.
2. Start every major module from `docs/templates/FEATURE_TEMPLATE.md`. Document purpose, actors, flow, inputs, outputs, business/validation/authorization rules, schema, API and frontend behavior before implementation.
3. Follow this mandatory sequence: **Requirements → Migration → Model → Form Request → Service → Controller → API Resource → Routes → Tests → Blade frontend**. Record why any step is genuinely not applicable. Do not jump directly to controllers or views.
4. Understand backend rules and tests before implementing frontend. Significant backend tests must pass before the Blade frontend is complete.
5. Keep controllers thin: receive validated data, authorize, call services, and select views/resources/responses.
6. Put business workflows in services. Services accept validated data or DTO-like arrays, never HTTP request objects. Share the service layer between web and API; do not duplicate logic or make internal HTTP calls.
7. Use Form Requests for non-trivial validation and reuse rules across delivery channels where appropriate.
8. Use API Resources under `App\Http\Resources\Api\V1` for JSON resource output. Preserve Laravel error and validation formats and meaningful HTTP status codes.
9. Use migrations for every schema change. Use transactions when partial writes to related records would leave invalid state.
10. Write readable feature tests for significant functionality; add isolated unit tests when useful. Cover success, validation, authentication, authorization, missing records, business rules, persistence and response shape as applicable.
11. Never expose or commit secrets. Never put real credentials in `.env.example` or modify `.env` with real credentials. Keep `.env`, dependencies, build output and local IDE settings ignored.
12. Do not install unnecessary packages, frontend frameworks, admin frameworks or architecture libraries. Do not create repositories per model; introduce an abstraction only for a demonstrated need.
13. Before editing an existing feature, inspect its service, model, Form Requests, routes, tests and existing conventions.
14. Make the smallest reasonable change. Preserve backward compatibility unless requirements explicitly request a breaking change.
15. Do not generate fake features, tables, services or placeholder classes to demonstrate architecture. Empty reserved directories use `.gitkeep`.
16. Use one shared users architecture unless identity requirements justify otherwise. Enforce sensitive operations server-side with middleware, policies or gates; UI visibility is not authorization.
17. Keep models focused on relationships, casts, scopes, mass assignment protection and lightweight behavior. Avoid N+1 queries, paginate collections, and process large datasets in chunks.
18. Queue expensive work when needed; use after-commit dispatch when jobs depend on committed data. Do not queue simple synchronous work or add speculative caching.
19. Public pages use Blade, Tailwind and Vite. Do not invent a website design: wait for the supplied Stitch design. Add portal route files only when those portals are implemented.
20. Run relevant tests, `vendor/bin/pint --test`, and `npm run build` for affected code. Report any checks that could not run and any required manual configuration.
