<?php

namespace Tests\Unit;

use App\Models\venda;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;


class ImportacaoTest extends TestCase
{
    Use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_check_model_venda_is_correct()
    {
        $venda = new venda();

        $expected = [
            'comprador',
            'descricao',
            'preco_unitario',
            'quantidade',
            'endereco',
            'fornecedor',
        ];

        $arrComparacao = array_diff($expected, $venda->getFillable());

        $this->assertEquals(0, count($arrComparacao));
    }
}
