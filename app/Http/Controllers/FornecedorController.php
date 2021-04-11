<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = ['Fornecedor 1', 'fornecedor 2']; 
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
