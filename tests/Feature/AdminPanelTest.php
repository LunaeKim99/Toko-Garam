<?php

namespace Tests\Feature;

use App\Models\CompanyProfile;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        CompanyProfile::factory()->create();
        Product::factory()->create();
    }

    public function test_admin_requires_auth(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_admin_dashboard_returns_ok_when_authenticated(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(200);
    }

    public function test_admin_company_profile_edit_returns_ok(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/profil/edit');
        $response->assertStatus(200);
    }

    public function test_admin_product_edit_returns_ok(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/produk/edit');
        $response->assertStatus(200);
    }

    public function test_admin_gallery_index_returns_ok(): void
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/admin/galeri');
        $response->assertStatus(200);
    }
}
