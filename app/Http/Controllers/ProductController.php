<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; // Importando a classe Auth

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
        // Filtra os produtos para mostrar apenas os do usuário logado
        $products = Product::where('user_id', Auth::id())->get();

        // Retorna a view com os produtos do usuário
        return view('stock.index', compact('products'));
    }
}