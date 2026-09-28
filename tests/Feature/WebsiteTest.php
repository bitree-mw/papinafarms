<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function test_public_page_routes_have_stable_named_urls(): void
    {
        $this->assertSame('/', route('website.home', absolute: false));
        $this->assertSame('/about-us', route('website.about', absolute: false));
        $this->assertSame('/farmers-membership', route('website.membership', absolute: false));
        $this->assertSame('/what-we-do', route('website.services', absolute: false));
        $this->assertSame('/markets-partners', route('website.markets', absolute: false));
        $this->assertSame('/resources', route('website.resources', absolute: false));
        $this->assertSame('/contact-us', route('website.contact', absolute: false));
    }

    public function test_unknown_public_page_returns_not_found(): void
    {
        $this->get('/not-a-public-page')->assertNotFound();
    }

    public function test_supplied_public_pages_render_with_working_navigation_and_local_assets(): void
    {
        foreach ([
            '/' => ['pages.home', 'Empowering Farmers.'],
            '/about-us' => ['pages.about', 'Nourishing Every Generation Through Sustainable Agribusiness.'],
            '/farmers-membership' => ['pages.membership', 'Who Can Apply for Membership?'],
            '/what-we-do' => ['pages.services', 'From farmer organisation to market.'],
            '/markets-partners' => ['pages.markets', 'Connecting producers. Building partnerships.'],
            '/resources' => ['pages.resources', 'Company information, ready to share.'],
            '/contact-us' => ['pages.contact', 'Let’s grow the conversation.'],
        ] as $url => [$view, $heading]) {
            $this->get($url)
                ->assertOk()
                ->assertViewIs($view)
                ->assertSee($heading)
                ->assertSee(route('website.about'))
                ->assertSee(route('website.membership'))
                ->assertSee('images/papina-icon-large.webp', false)
                ->assertSee('papinafarms.info@gmail.com')
                ->assertSee('+265 993 674 530')
                ->assertSee('+265 887 488 928')
                ->assertSee('Chibavi Community Market Building')
                ->assertSee(route('website.services'))
                ->assertSee(route('website.markets'))
                ->assertSee(route('website.resources'))
                ->assertSee(route('website.contact'))
                ->assertDontSee('info@papinafarms.mw')
                ->assertDontSee('membership@papinafarms.mw')
                ->assertDontSee('999 123 456')
                ->assertDontSee('12,400+')
                ->assertDontSee('MBS Certified')
                ->assertSee('build/assets/', false)
                ->assertDontSee('href="#"', false)
                ->assertDontSee('cdn.tailwindcss.com')
                ->assertDontSee('Registration Form Downloaded');
        }
    }

    public function test_membership_guidance_has_registration_and_checklist_targets(): void
    {
        $this->get('/farmers-membership')
            ->assertOk()
            ->assertSee('id="registration"', false)
            ->assertSee('id="checklist-section"', false)
            ->assertSee('mailto:papinafarms.info@gmail.com', false)
            ->assertSee('Official registration form coming soon.');
    }

    public function test_resources_links_to_the_supplied_company_profile(): void
    {
        $this->get('/resources')
            ->assertOk()
            ->assertSee(asset(config('company.profile')), false)
            ->assertSee('download=', false);

        $this->assertFileExists(public_path(config('company.profile')));
        $this->assertSame(
            hash_file('sha256', base_path('secure_docs/Papina_Farms_Ltd_Stakeholder_Company_Profile.pdf')),
            hash_file('sha256', public_path(config('company.profile'))),
        );
    }

    public function test_priority_stakeholders_are_not_claimed_as_confirmed_partners(): void
    {
        $this->get('/markets-partners')
            ->assertOk()
            ->assertSee('Priority stakeholders')
            ->assertSee('UNDP')
            ->assertSee('TEVET Malawi')
            ->assertSee('does not imply an existing partnership');
    }

    public function test_public_shell_renders_with_vite_assets(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertViewIs('pages.home')
            ->assertSee('Papina Farms')
            ->assertSee('build/assets/', false);
    }

    public function test_framework_health_endpoint_responds(): void
    {
        $this->get('/up')->assertOk();
    }
}
