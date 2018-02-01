<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

/* Faz o controlle da tabela de produtos */
class ProdutoController extends Controller
{

    private $product;
    private $totalpage = 1;

    /* Faz o ID da model Product que carrega os dados da tabela products*/
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    // Lista os produtos, todos os dados estão no product->all() vindo da model product.
    public function index()
    {
        $products = $this->product->paginate($this->totalpage);
        return view('painel.product.index', compact('products'));
    }

    /* Mostra o formulário para criar um novo item.*/
    public function create()
    {
        $title = 'Formulário de cadastro';
        /* Mostra no formulário os dados que podem ser preenchidos */
        /* vem da migration */
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.product.create-edit', compact('title', 'categorys'));
    }

    /* Armazene os dados vindo do formulário */
    // valida os dados,está vindo da ProductFormRequest //
    /* alternativa seria deixar a validação do Product */
    //$this->validate($request, $this->product->rules, $this->product->messages);
    public function store(ProductFormRequest $request)
    {
        $data = $request->all();
        /* verifica se o campo active ou preenchido */
        $data['active'] = (isset($data['active']) == '') ? 0 : 1;

        $insert = $this->product->create($data);

        /* Se gravar com sucesso redireciona para index */
        if($insert)
        {
            return redirect()->route('produtos.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    /* Mostro um item pelo id */
    public function show($id)
    {
       $product = $this->product->find($id);

       $title = "Produtos: {$product->name}";

       return view('painel.product.show', compact('product', 'title'));
    }

    /* Recebe um item pelo seu ID é mostra no formulário */
    public function edit($id)
    {
        // pega o ID do produto
        $product = $this->product->find($id);

        $title = "Editar Produtos {$product->name}";

        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.product.create-edit', compact('title', 'categorys', 'product'));
    }

    /* Atualiza um produto pelo id*/
    public function update(ProductFormRequest $request, $id)
    {
        // pega todos os dados que vem do metodo edit atravez do formulário.
        $data = $request->all();
        // recebe o ID do produto 
        $product = $this->product->find($id);

        /* verifica se o campo active ou preenchido */
        $data['active'] = (isset($data['active']) == '') ? 0 : 1;

        $update = $product->update($data);

        if($update){
            return redirect()->route('produtos.index');
        }else{
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
        }
    }

    /* Remove um item pelo id */
    public function destroy($id)
    {
       $product = $this->product->find($id);

       $delete = $product->delete();

       if($delete){
         return redirect()->route('produtos.index');
       }
       else{
         return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
       }
    }

    /* TESTES */
    public function teste()
    {
       /*$insert = $this->product->create([
            'name' => 'TV',
            'number' => 741258,
            'active' => 1,
            'category' => 'eletronicos',
            'description' => 'Sansung quality'
        ]);
     

        if($insert){
            return 'inserido com sucesso!';
        }else{
            return 'falha';
        }*/
    }
}
