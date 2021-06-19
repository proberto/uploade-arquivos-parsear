<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';
    public $timestamps = true;


    protected $fillable = [
        'comprador',
        'descricao',
        'preco_unitario',
        'quantidade',
        'endereco',
        'fornecedor',
    ];
}
