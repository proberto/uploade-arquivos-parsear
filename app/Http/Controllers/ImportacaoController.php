<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\venda;

class ImportacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('importacao.importacao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nomeArquivo = null;
        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid())
        {
            $nomeArquivo = time().'.'.$request->file('arquivo')->getClientOriginalExtension();
            $upload = $request->file('arquivo')->storeAs('upload', $nomeArquivo);

        }

        $filePath = Storage::path('/upload/'.$nomeArquivo, 'r');
        $file = fopen($filePath, 'r');
        $linhas = array();
        $i = 0;
        while (!feof($file))
        {
            $linhas[$i] = fgets($file);
            $i++;
        }
        $arr = array_shift($linhas);
        $vend = 0;
        foreach($linhas as $linha){
            [$comprador, $descricao, $preco_unitario, $quantidade, $endereco, $fornecedor] = preg_split('/[\t,]+/',$linha);

            venda::create([
                'comprador' => $comprador,
                'descricao' => $descricao,
                'preco_unitario' => floatval($preco_unitario),
                'quantidade' => $quantidade,
                'endereco' => $endereco,
                'fornecedor' => $fornecedor,
            ]);
            $vendas[$vend] = ['comprador' => $comprador, 'descricao' => $descricao, 'preco_unitario' => $preco_unitario, 'quantidade' => $quantidade, 'endereco' => $endereco, 'fornecedor' => $fornecedor];
            $vend++;

        }

        return view('importacao.resposta', compact('vend', 'vendas'));

    }

}
