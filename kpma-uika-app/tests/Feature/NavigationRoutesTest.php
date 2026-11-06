<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\InformationPost;
use App\Models\SpmiDocument;
use App\Models\SpmeItem;
use App\Models\Regulation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavigationRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed Database for testing routes
        $this->seed();
    }

    /** @test */
    public function test_home_page_returns_http_200_ok()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('KPMA UIKA');
    }

    /** @test */
    public function test_spmi_category_page_returns_http_200_ok()
    {
        $response = $this->get('/spmi/dokumen_spmi');
        $response->assertStatus(200);

        $responseEvaluasi = $this->get('/spmi/evaluasi');
        $responseEvaluasi->assertStatus(200);
    }

    /** @test */
    public function test_spme_category_page_returns_http_200_ok()
    {
        $response = $this->get('/spme/akreditasi_nasional');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_regulations_page_returns_http_200_ok()
    {
        $response = $this->get('/regulations');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_information_index_and_detail_pages_return_http_200_ok()
    {
        $response = $this->get('/information');
        $response->assertStatus(200);

        $post = InformationPost::first();
        if ($post) {
            $detailResponse = $this->get("/information/{$post->slug}");
            $detailResponse->assertStatus(200);
            $detailResponse->assertSee($post->title);
        }
    }

    /** @test */
    public function test_login_page_returns_http_200_ok()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_unauthenticated_user_redirected_from_admin_dashboard()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function test_authenticated_admin_can_access_admin_dashboard()
    {
        $user = User::where('email', 'admin@uika-bogor.ac.id')->first();
        if (! $user) {
            $user = User::factory()->create(['role' => 'admin']);
        }

        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Dashboard Manajerial APPS KPMA');
    }
}
