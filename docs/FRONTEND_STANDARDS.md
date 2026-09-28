# Frontend standards

Use Blade with Tailwind CSS 4 and Vite. No React, Vue, Next.js, Inertia or admin UI framework. The public page is an unstyled foundation shell; do not invent a visual design before the Stitch template is supplied.

- `resources/views/layouts/app.blade.php`: shared document and Vite asset entry points.
- `resources/views/pages`: page views.
- `resources/views/components`: reusable Blade components when needed.
- `resources/views/partials`: shared fragments when needed.
- `resources/css/app.css`: Tailwind import, source discovery and eventual project styles.
- `resources/js/app.js`: minimal JavaScript entry point.
- `vite.config.js`: Laravel and Tailwind Vite plugins.

Run `npm install` after cloning or intentionally updating dependencies, `npm ci` for repeatable installs, `npm run dev` for development and `npm run build` for production assets. Commit package-lock.json, not node_modules, public/build or public/hot. Use `@vite` in the layout; a production build or running dev server is required to render asset tags. Tailwind scans Blade and JavaScript sources; prefer complete utility class names rather than dynamic concatenation that source scanning cannot detect.

Understand backend rules and tests before building a feature's UI. Blade controllers use the same services as API controllers directly, without internal HTTP calls. Share validation where appropriate. Escape output with Blade's normal syntax, use `@csrf` for state-changing forms, show validation errors and old input, and enforce authorization on the server even when controls are hidden.

Once UI requirements arrive, preserve semantic markup, labels, keyboard navigation, visible focus and responsive behavior. Extract components when actual repetition justifies them. Do not introduce placeholder dashboard screens or design systems now.

Reference: [Tailwind's Laravel/Vite setup](https://tailwindcss.com/docs/installation/framework-guides/laravel/vite).
