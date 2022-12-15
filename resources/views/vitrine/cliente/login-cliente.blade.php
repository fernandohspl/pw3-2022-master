@extends('vitrine.client')

@section('content-title')
    <h2>Login do Cliente</h2>
@endsection

@section('content')
    <div class="col-md-3"></div>
    <div class="col-md-6.col-sm-6">
        <form action="{{route('cliente.login')}}" class="cart" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control"required>
            </div>
            <div class="form-grupo">
                <a href="#" class="btn btn-danger">Cancelar</a>
                <input type="submit" value="Entrar" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
