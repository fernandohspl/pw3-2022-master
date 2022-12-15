<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function  __construct(){
        $this->middleware('client');
    }
    public  function checarPedido(){
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $itens = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        return view('vitrine.carrinho.checar', compact('itens', 'categorias', 'subcategorias'));
    }
    public  function  finalizarPedido(){
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $itens = \Cart::getContent();

        $pedido = new Pedido();
        $pedido->client_id = Auth::guard('vitrine')->user()->id;
        $pedido->save();

        foreach ($itens as $iten){
            $item_pedido=new ItemPedido();
            $item_pedido->pedido_id = $pedido->id;
            $item_pedido->quantidade = $item->quantity;
            $item_pedido->valor = $item->price;
            $item_pedido->produto_id = $item->id;
            $item_pedido->save();
        }
        return redirect()->route('vitrin.clearcarrinho');
    }

}
