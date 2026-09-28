# Development workflow

Every major module starts with a requirements document copied from [FEATURE_TEMPLATE.md](templates/FEATURE_TEMPLATE.md), stored under `docs/features/` when needed. Document what it does, actors, user flow, inputs, outputs, business rules, validation, authorization, database changes, API behavior, errors and frontend behavior before implementing it. Resolve unclear security or data rules before dependent work.

Follow this sequence:

1. **Requirements / Flow**: agree the behavior and acceptance criteria.
2. **Migration**: design constraints, foreign keys, indexes and rollback implications.
3. **Model**: relationships, protected mass assignment, casts and scopes.
4. **Form Request**: non-trivial validation, useful messages and request-level authorization; share applicable rules.
5. **Service**: business invariants, transactions and job/integration coordination, independent of HTTP.
6. **Controller**: receive validated data, authorize, call services and select responses.
7. **API Resource**: deliberately expose versioned fields and conditional relationships.
8. **Routes**: use appropriate middleware, versioning and route names.
9. **Tests**: verify backend acceptance criteria, success and failure paths.
10. **Blade frontend**: implement the supplied design against the verified backend and reuse services.

This order is mandatory. A genuinely inapplicable step may be skipped only with a reason in the feature document (for example, a static page has no persistence or validation). Do not invent classes or tables to satisfy the sequence. Tests may be written earlier to drive implementation, but backend rules and tests must be understood before frontend work and passing before frontend completion.

Before editing an existing feature, inspect its service, model, requests, routes, tests and conventions. Make the smallest reasonable change and preserve backward compatibility unless a breaking change is explicitly required. Record justified architectural departures rather than introducing new patterns silently.

Before handing off, run applicable tests, Pint and the frontend build; review diffs for secrets, generated output, duplicated business logic and unintended schema/API changes. Update feature documentation and report checks and manual configuration. Never use production credentials or databases for tests.
