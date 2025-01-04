<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; // Importando o Modelo Produto (que você criará a seguir)

class StockController extends Controller
{
    public function index()
    {
        // Buscando todos os produtos no estoque
        $products = Products::all();

        // Retornando a view com os produtos
        return view('stock.index', compact('products'));
    }
}