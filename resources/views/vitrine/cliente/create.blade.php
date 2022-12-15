@extends('vitrine.client')

@section('content-title')
    <h2>Registro do Cliente</h2>
@endsection

@section('content')
    <div class="col-md-3"></div>
    <div class="col-md-6.col-sm-6">
        <form action="{{route('cliente.store')}}" class="cart"method="post">
            @csrf
           <div class="form-group">
               <label for="name">Nome:</label>
               <input type="text" name="name" id="name" class="form-control"required>
           </div>
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control"required>
            </div>
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" class="form-control"required>
            </div>
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="password_confirmation">Confirmar senha:</label>
                <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control"required>
            </div>
            @error('password_confirmation')
            <p class="text-danger">{{$message}}</p>
            @enderror
           <div class="form-grupo">
               <a href="#" class="btn btn-danger">Cancelar</a>
               <input type="submit" value="Salvar" class="btn btn-primary">
           </div>
        </form>
    </div>
@endsection
