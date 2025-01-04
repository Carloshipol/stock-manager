<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

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

        // Criação do produto
        Product::create($validated);

        return redirect()->route('products.create')->with('success', 'Produto cadastrado com sucesso!');
    }
}