<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // Importando o Modelo Produto
use Illuminate\Support\Facades\Auth; // Importando a classe Auth

class StockController extends Controller
{
    public function index()
    {
        // Buscando todos os produtos no estoque
        // Filtra os produtos para mostrar apenas os do usuário logado
        $products = Products::where('user_id', Auth::id())->get();

        // Retornando a view com os produtos
        return view('stock.index', compact('products'));
    }

    public function increaseStock(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->amount += $request->input('quantity', 1); // Incrementa o estoque (padrão 1)
        $product->save();

        return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
    }

    public function decreaseStock(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $quantity = $request->input('quantity', 1);

        if ($product->amount - $quantity < 0) {
            return redirect()->back()->with('error', 'Quantidade insuficiente no estoque!');
        }

        $product->amount -= $quantity; // Decrementa o estoque
        $product->save();

        return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
    }

    public function update(Request $request)
{
    $product = Products::findOrFail($request->input('product_id'));
    $quantity = $request->input('quantity');
    $action = $request->input('action');

    if ($action === 'increase') {
        $product->amount += $quantity;
    } elseif ($action === 'decrease') {
        if ($product->amount - $quantity < 0) {
            return redirect()->back()->with('error', 'Quantidade insuficiente no estoque!');
        }
        $product->amount -= $quantity;
    }

    $product->save();

    return redirect()->back()->with('success', 'Estoque atualizado com sucesso!');
}

public function insert(Request $request)
{
    // Validando os dados
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'amount' => 'required|integer',
        'validity' => 'required|date',
        'price' => 'required|numeric',
    ]);

    try {
        // Criando o produto
        Products::create([
            'name' => $request->name,
            'category' => $request->category,
            'amount' => $request->amount,
            'validity' => $request->validity,
            'price' => $request->price,
            'user_id' => Auth::id(), // Associando ao usuário logado
        ]);

        return redirect()->route('stock.index')->with('success', 'Produto cadastrado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->route('stock.index')->with('error', 'Erro ao cadastrar o produto.');
    }
}




}