@extends('layout')

@section('content')
<h1>Clientes</h1>

@if(!empty($feedback))
<div class="alert alert-success">{{$feedback}}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    @csrf
    <div>
        <label for="empresa">Empresa</label>
        <input type="text" name="empresa" id="empresa">
    </div>

    <button type="submit">Adicionar</button>
</form>

<ul>
    @foreach($clientes as $cliente)
    <li>{{ $cliente->empresa }}</li>
    @endforeach
</ul>
@endsection
