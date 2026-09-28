# Company-profile public pages

## Purpose
Extend the supplied visual theme with dedicated What We Do, Markets & Partners, Resources and Contact Us pages, and reconcile public company copy with `secure_docs/Papina_Farms_Ltd_Stakeholder_Company_Profile.pdf` (three pages).

## Users / Actors
Farmers, cooperatives, producer organisations, buyers, processors, young people, investors and development stakeholders.

## User Flow
Navigate directly to each page. Explore services and commodities, review market channels and partnership opportunities, download the supplied company profile, and contact Papina Farms through email or telephone links.

## Business Rules
The supplied profile is the source of truth. Established in 2020, Papina Farms grew from a cooperative initiative into a limited company. Priority stakeholders are not represented as confirmed partners. Development outcomes are ambitions, not measured results. Remove unsupported statistics, staff identities, certifications, addresses and fictional news from the previous template content. Registration terms and application PDFs remain unprovided; do not invent approval processes or financial guarantees.

## Inputs
Public GET requests; no contact form submissions or personal data collection.

## Outputs
Seven public Blade pages and the supplied company profile download. Contact details are shared through `config/company.php` to keep all pages consistent.

## Validation Rules
No submitted inputs. Form Request is not applicable.

## Authorization
Pages and the stakeholder company profile are public. Do not expose the source directory or other documents.

## Database Changes
None; Migration is not applicable.

## Models / Relationships
None; Model is not applicable to informational content.

## Service Responsibilities
None; no business workflow or persistence. Static configuration is sufficient.

## API Endpoints
None. Static pages retain `Route::view`; a Controller is not applicable.

## API Responses
None. API Resource is not applicable.

## Error Cases
Unknown routes remain 404. The registration PDF has an honest unavailable state. Email/telephone links open the visitor's own applications and do not claim to send a message.

## Blade / UI Requirements
Reuse the existing forest-green theme, local imagery, self-hosted fonts, 1440px frame, responsive gutters, rounded surfaces and 40px section spacing. Keep nav labels and existing slugs stable. Add `/what-we-do`, `/markets-partners`, `/resources`, `/contact-us`. Active desktop nav gets 12px vertical and 14px horizontal padding; mobile active links also get generous padding. Keep the desktop navigation on one line and the mobile menu keyboard accessible. Use the same variance 4, motion 3, density 5 settings as the previous implementation.

## Tests Required
Named URLs, all pages rendering, correct contact details everywhere, dedicated navigation, real profile download asset, absence of unsupported template claims and preserved membership anchors. Check desktop/mobile layouts, active tabs, download, contact links, menu, Pint, production build and existing tests.

## Performance Considerations
Reuse local WebP photographs and subset fonts. No additional libraries or external embeds.

## Security Considerations
No database access or sending messages. Only the supplied stakeholder profile is copied to public documents; the source stays in `secure_docs`.

## Implementation Sequence
Requirements recorded first. Migration, Model, Form Request, Service, Controller and API Resource are inapplicable for the reasons above. Then Routes, backend Tests, followed by Blade frontend and browser verification.

## Source Mapping
Profile page 1: contacts, history, vision, mission, objectives and farmer/aggregation services. Page 2: remaining services, nine-stage value chain, commodities, beneficiaries, target markets, priority stakeholders and partnership opportunities. Page 3: intended impact, sustainability, growth and partnership rationale.

## Verification Completed
- Laravel: 15 tests passed with 324 assertions. Pint and Vite production build passed.
- Browser: 49 viewport checks across all seven pages at 320, 390, 768, 1024, 1280, 1400 and 1440px. No horizontal overflow, broken images, missing local anchors or browser errors.
- Active desktop tab padding measured at 12px vertically and 14px horizontally. Each page selects its own navigation item.
- Verified mobile navigation, Escape dismissal, dedicated page navigation, checklist focus and the company-profile download. Downloaded bytes match the supplied original PDF.
- Visually reviewed desktop and mobile pages against the existing theme. Existing images, typography, colors and spacing are retained.
- Lighthouse: all four new pages scored 100 for accessibility. What We Do scored 97 for performance and 100 for SEO. Its best-practices score was 78 due to the local HTTP preview; production HTTPS configuration is still required.
- Vite reports that public font URLs resolve at runtime; browser checks confirm the local fonts load successfully.

## Outstanding Content
Only the official membership registration form remains unprovided. The website clearly marks it as coming soon; this does not block the dedicated informational pages.

## Brand and Navigation Refinements
Use `inspo/papina_icon_largge.png/screen.png` for the header/footer brand mark, favicon and Apple touch icon. The membership button shares the active navigation tab padding: desktop 12px vertical/14px horizontal, mobile menu 14px vertical/16px horizontal. Profile download and PDF links appear only on Resources; other pages link to Resources instead.
