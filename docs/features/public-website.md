# Public website from supplied Stitch templates

> Historical implementation record. Company copy, dedicated pages, contact details and PDF availability are superseded by [company-profile pages](company-profile-pages.md).

## Purpose
Implement the Home, About Us, and Farmers & Membership designs in `inspo/`, using `inspo/DESIGN.md` and the supplied screenshots as the visual reference.

## Users / Actors
Public visitors, farmer groups, cooperatives, prospective buyers and partners.

## User Flow
Browse the three public pages, follow service/partner/resource section links, read membership eligibility and the supporting-document checklist, and contact the relevant office by email.

## Business Rules
This delivery implements the public informational website only. Membership approval, online applications, account access, article detail pages and document generation are not implemented in the supplied application. Do not simulate downloads or successful applications. The owner will supply official PDFs. Document actions are disabled with a visible coming-soon message until those files are available. Preserve supplied business copy; its statistics, people, contacts and accreditation claims require owner verification before public launch.

## Inputs
Public GET requests and ordinary browser navigation. No personal information is collected by the application.

## Outputs
Server-rendered HTML, locally served images/fonts, compiled CSS and minimal JavaScript.

## Validation Rules
No submitted data; Form Requests are not applicable.

## Authorization
All implemented pages are public. No authentication or portal routes are introduced.

## Database Changes
None. Migration step is not applicable because the website has no persistence.

## Models / Relationships
None. Model step is not applicable to static content.

## Service Responsibilities
None. No business workflow, integration or calculation is added; a service would be artificial.

## API Endpoints
None. Existing versioned API behavior remains intact.

## API Responses
Not applicable. API Resource step is skipped because this feature returns HTML only.

## Error Cases
Unknown routes retain Laravel 404 responses. Missing official downloads have a visible pending state without simulated success.

## Blade / UI Requirements
Use Blade, Tailwind 4 and Vite. Preserve template section ordering, typography, 1440px containers, 48px desktop/20px mobile gutters, 24px grid gaps and 40px section spacing. Preserve the template color/radius classes where they differ from prose in DESIGN.md, since screenshot fidelity is the requested outcome. Use shared navigation and footer; provide accessible mobile navigation, focus indicators and skip link. Retain supplied imagery and Material Symbols rather than inventing new assets or replacing the brand. The supplied light theme with green feature bands is intentional and overrides generic skill defaults for dark mode, section inversion, hero line counts and card arrangements. Motion intensity 3: feedback transitions only, respecting reduced motion.

## Tests Required
Public routes render with Vite assets and expected page content; navigation resolves to real pages/sections; no template demo downloads remain; unknown pages return 404. Existing API/authentication tests must pass before frontend completion. Run Pint and the production build. Inspect desktop and mobile rendering, menu operation, anchors, images and horizontal overflow.

## Performance Considerations
Self-host supplied assets and fonts, lazy-load below-fold photos, compile Tailwind through Vite, avoid new runtime frameworks.

## Security Considerations
No credentials, new data storage or external message sending. Email links open the visitor's email client. Do not enable public account controls for nonexistent portals.

## Implementation sequence
Requirements: this document. Migration, Model, Form Request and Service: inapplicable for the reasons above. Controller: use Laravel's existing `Route::view` convention for static pages. API Resource: inapplicable. Next implement Routes, verify backend Tests, then complete Blade frontend and visual verification.

## Verification completed
- Laravel: 13 tests passed, 182 assertions. Pint passed. Vite production build passed.
- Browser: all three pages checked at 320, 390, 768, 1024, 1280 and 1440px. No horizontal overflow, broken images, missing local anchor targets or browser errors. Mobile navigation, Escape dismissal, membership navigation and checklist focus verified.
- Visual review: desktop and mobile screenshots compared with supplied page compositions. The reference light palette remains consistent under system dark preference; reduced motion produces no animations.
- Lighthouse mobile lab audit: Home performance 97, accessibility 100, SEO 100, CLS 0 and total blocking time 0ms. LCP measured 2.6 seconds. About and Membership accessibility 100. These are local lab measurements, not production guarantees. Best practices scored 78 because the local Herd preview uses HTTP; configure HTTPS and static-asset caching on the production server.
- The first Lighthouse command produced its report but failed during Windows temporary-directory cleanup. A subsequent managed-browser audit completed successfully.
- Vite leaves `/fonts/*.woff2` URLs for runtime resolution because Laravel disables Vite's public directory processing. Browser checks verified all three locally served fonts load correctly.

## Remaining owner inputs
Provide official registration and corporate-profile PDFs. Confirm template-supplied people, statistics, partners, contacts, dates and accreditation statements before launch. Full article copy and online membership/account workflows were not supplied and are not simulated.
