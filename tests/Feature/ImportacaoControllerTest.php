<?php

namespace Tests\Feature;

use App\Models\venda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImportacaoControllerTest extends TestCase
{

    public function testIndex()
    {
        $this->call('GET', 'importacao');
        $this->view('importacao.importacao');
    }

    public function testStore()
    {
        $this->call('POST', 'importacao.store');

        $this->view('importacao.importacao');
    }

    public function test_create_venda()
    {
        venda::create([
            'comprador' => 'Paulo',
            'descricao' => 'R$10 off R$20 of food',
            'preco_unitario' => floatval('10.0'),
            'quantidade' => '4',
            'endereco' => '456 Unreal Rd',
            'fornecedor' => "Tom's Awesome Shop",
        ]);

        $this->assertDatabaseHas('vendas', ['comprador' => 'Paulo']);
    }


}
