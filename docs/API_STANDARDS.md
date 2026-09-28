# API standards

Register APIs in `routes/api.php` through Laravel's API routing configuration. The framework supplies `/api`; this file supplies `/v1`. Keep the file readable and split it only when necessary. Actor prefixes `customer`, `buyer` and `admin` are reserved, not implemented endpoints. Public resource routes may live directly under v1 when requirements justify them.

Use RESTful resource naming and standard HTTP verbs. Controllers live in `App\Http\Controllers\Api\V1`, resources in `App\Http\Resources\Api\V1`. Use Form Requests and shared services, then return explicit API Resources, not raw Eloquent models. Paginate large collections and preserve Laravel's pagination links/meta. Load only required relationships and use conditional resource relationships to avoid N+1 queries.

Laravel's normal `{"data": ...}` resource envelope is the default. A custom success message may use `{"message":"Operation completed.","data":{}}`. A 204 response has no body. Do not create a universal envelope middleware or replace Laravel's validation format.

| Status | Use |
| --- | --- |
| 200 | Successful read/update with body |
| 201 | Resource created |
| 204 | Successful operation without a body |
| 400 | Malformed request where appropriate |
| 401 | Missing or invalid authentication |
| 403 | Authenticated but forbidden |
| 404 | Resource or route not found |
| 422 | Validation failure (`message` and `errors`) |
| 429 | Request rate limit exceeded |
| 500 | Unexpected server failure |

Never report a failure as 200. Keep Laravel's normal exception/validation handling; bootstrap forces JSON for `api/*` even without an Accept header. Consumers should still send `Accept: application/json`. Keep debug off in deployed environments so exception internals are not exposed.

## Authentication and authorization

Sanctum is installed with configuration, token migration and HasApiTokens on User. No token-issuing, login, profile or dashboard endpoints are provided. Future protected routes must use `auth:sanctum`, appropriate policies/gates and any actor middleware. Scope tokens using abilities where useful, choose expiration/revocation behavior, and never log plaintext tokens. Maintain shared users; roles are a future requirements decision.

Blade portals use ordinary session authentication and CSRF protection. Stateful SPA middleware is deliberately not enabled because there is no SPA. If a first-party browser API consumer is later introduced, configure Sanctum stateful domains, cookies, CORS and CSRF for that deployment; do not substitute browser-stored bearer tokens for the normal first-party session flow.

A native `api` rate limiter (60 requests/minute per authenticated user or IP) is applied to the API group. Design stricter authentication or expensive-operation limits when those endpoints exist. Use shared cache storage in multi-instance deployments. Authorization must still be enforced independently of throttling and token abilities.

API tests must check HTTP status, response fields, validation errors, authentication/authorization, missing records, business failures and persistence. Changes within v1 should remain backward compatible; document an explicit new version for breaking consumer contracts.

References: [Laravel Sanctum](https://laravel.com/docs/13.x/sanctum), [API Resources](https://laravel.com/docs/13.x/eloquent-resources).
