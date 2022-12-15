@extends('vitrine.cart')

@section('title')
    <h2>Revise o seu pedido</h2>
@endsection

@section('cart-itens')
    @if(!Auth::guard('vitrine')->guest())
        <a href="{{route('cliente.logout')}}">  {{Auth::guard('vitrine')->user()->name}}</a>
    @if(count($itens) == 0)
        <div id="empty-cart" class="alert alert-warning" role="alert">
            <p>Seu carrinho de compras está vazio!</p>
            <p>Aproveite nossas promocões.</p>
            <a href="{{route('vitrine.index')}}" class="btn btn-warning">Voltar às compras</a>
        </div>
    @else
        <table class="table table-hover">
            <thead class="table-head-cart">
            <tr>
                <th>Imagem</th>
                <th class="column-name-cart">Nome</th>
                <th>Valor</th>
                <th class="text-center" Quantidade</th>
            </tr>
            </thead>
            <tbody class="table-body-cart">
            @foreach($itens as $item)
                <tr>
                    <td><img src="{{\Illuminate\Support\Facades\Storage::url('produtos/'.$item->attributes->image)}}" alt="" class="item-image-cart"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td class="text-center"> {{$item->quantity}} </></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="table-foot-cart">
            <tr>
                <td colspan="4">TOTAL: {{\Cart::getTotal()}}</td>
            </tr>
            </tfoot>
        </table>
        <div class="cart-navigate">
            <div class="col-md-4 text-center">
                <a href="{{route('vitrine.index')}}" class="btn btn-primary">Continuar comprando</a>
            </div>
            <div class="col-md-4 text-center">
            </div>
             <div class="col-md-4 text-center">
                <a href="{{route('pedido.finalizar')}}" class="btn btn-success">Finalizar compra</a>
            </div>
        </div>
    @endif
@endsection
