@extends('adminlte::page')
@section('title','Novo Usuário')
@section('content_header')
<h1>
    Novo Usuário
</h1>
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        <h5>Ocorreu um erro!</h5>
        <i class="icon fas fa-ban"></i>

        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
   
    <div class="card-body">

<form action="{{route('users.store')}}" method="POST" class="form-horizontal">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nome Completo</label>
        <div class="col-sm-6">
            <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">E-mail</label>
        <div class="col-sm-6">
            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" />
        </div>
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Setor</label>
        <select class="form-select" name="setor" id="inputGroupSelect01">
          <option selected value="TI" name="ti">TI</option>
          <option value="Limpeza" name="limpeza">Limpeza</option>
          <option value="RH" name="rh">RH</option>
          <option value="Suporte" name="suporte">Suporte</option>
        </select>
    </div> 
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Senha</label>
        <div class="col-sm-6">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Senha novamente</label>
        <div class="col-sm-6">
            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-6">
            <input type="submit" value="Cadastrar" class="btn btn-success" />
        </div>
    </div>
    
</form>
    </div>
</div>

@endsection
