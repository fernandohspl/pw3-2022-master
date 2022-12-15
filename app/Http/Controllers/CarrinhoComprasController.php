<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class CarrinhoComprasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $itens = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        return view('vitrine.carrinho.index', compact('itens', 'categorias', 'subcategorias'));
    }

    public function adicionarItemCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->valor,
            'quantity' => $request->quantity,
            'attributes' => [
                'image'=> $request->image
            ]
        ]);

        return redirect()->route('vitrine.carrinho');
    }

    public function removerItemCarrinho(Request $request){
        \Cart::remove($request->id);

        return redirect()->route('vitrine.carrinho');
    }

    public function limparCarrinho()
    {
        \Cart::clear();

        return redirect()->route('vitrine.carrinho');
    }

    public function alterarItemCarrinho(Request $request){
        \Cart::update($request->id, array(
            'quantity'=>array(
                'relative'=> false,
            'value' => $request->quantity
            ),
        )
            return redirect()->route('vitrine.carrinho');
    }
}
