<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products'; // Nome da tabela (caso seja diferente do padrão plural)

    // Defina os campos que podem ser preenchidos
    protected $fillable = ['name', 'category', 'amount', 'validity','price', 'created_at', 'updated_at'];
}