<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TipoPago;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TipoPagoFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_tipos_de_pago()
    {
        TipoPago::create(['descrip_tipo_pago' => 'Efectivo']);
        TipoPago::create(['descrip_tipo_pago' => 'Tarjeta']);

        $response = $this->getJson('/api/tipo-pago'); 

        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonFragment(['descrip_tipo_pago' => 'Efectivo']);
        $response->assertJsonFragment(['descrip_tipo_pago' => 'Tarjeta']);
    }
}
