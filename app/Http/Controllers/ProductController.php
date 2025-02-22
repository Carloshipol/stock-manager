<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; // Importando a classe Auth
use Yajra\DataTables\Facades\DataTables;  // Importando o DataTables

class ProductController extends Controller
{
    // Método para exibir o formulário de criação de produto
    public function create()
    {
        return view('products.create');
    }

    // Método para armazenar um novo produto
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'amount' => 'required|integer|min:1',
            'validity' => 'required|date',
            'price' => 'required|numeric|min:0',
        ]);

        // Criação do produto com o user_id atribuído
        $product = new Product($validated);
        $product->user_id = Auth::id();  // Atribui o id do usuário logado
        $product->save();

        return redirect()->route('stock.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    // Método para exibir os produtos do usuário logado
    public function index()
{
    // Apenas retorna a view
    return view('products.index');
}



    // Método para fornecer dados para o DataTables via AJAX
    public function getData(Request $request)
{
    // Filtra os produtos para mostrar apenas os do usuário logado
    $products = Product::where('user_id', Auth::id());

    // Verifica se há algum filtro de pesquisa sendo feito
    if ($request->has('search') && $request->search['value']) {
        $searchValue = $request->search['value'];
        $products = $products->where(function($query) use ($searchValue) {
            $query->where('name', 'like', "%{$searchValue}%")
                  ->orWhere('category', 'like', "%{$searchValue}%")
                  ->orWhere('amount', 'like', "%{$searchValue}%")
                  ->orWhere('validity', 'like', "%{$searchValue}%")
                  ->orWhere('price', 'like', "%{$searchValue}%");
        });
    }

    // Ordena os produtos com base na coluna e direção
    if ($request->has('order')) {
        $orderColumn = $request->order[0]['column'];
        $orderDirection = $request->order[0]['dir'];
        $columns = $request->columns;
        $products = $products->orderBy($columns[$orderColumn]['data'], $orderDirection);
    }

    // Paginação
    $products = $products->skip($request->start)
                         ->take($request->length)
                         ->get();

    // Retorna os dados para o DataTables
    return DataTables::of($products)
        ->addColumn('action', function($product) {
            return '<a href="' . route('products.edit', $product->id) . '" class="btn btn-sm btn-primary">Editar</a>
                    <a href="' . route('products.destroy', $product->id) . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza?\')">Excluir</a>';
        })
        ->make(true);
}

}