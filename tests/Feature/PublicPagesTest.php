<?php

namespace Tests\Feature;

use App\Models\CompanyProfile;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        CompanyProfile::factory()->create();
        Product::factory()->create();
        Gallery::factory()->count(3)->create();
    }

    public function test_home_page_returns_ok(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_about_page_returns_ok(): void
    {
        $response = $this->get('/tentang');
        $response->assertStatus(200);
    }

    public function test_product_page_returns_ok(): void
    {
        $response = $this->get('/produk');
        $response->assertStatus(200);
    }

    public function test_gallery_page_returns_ok(): void
    {
        $response = $this->get('/galeri');
        $response->assertStatus(200);
    }

    public function test_contact_page_returns_ok(): void
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
    }
}