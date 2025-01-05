<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // Importando o Modelo Produto

class StockController extends Controller
{
    public function index()
    {
        // Buscando todos os produtos no estoque
        $products = Products::all();

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


}