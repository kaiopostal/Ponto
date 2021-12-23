@extends('adminlte::page')


@section('title', 'Usuários')

@section('content_header')
    <h1>Meus usuários 

        <a href="{{route('users.create')}}" class="btn btn-sm btn-success">Novo Usuario</a>

    </h1>
@endsection


@section('content')

<div class="card">
    <div class="bodu">

    <table class="table table-hover">
        <thead>
             <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Setor</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->setor}}</td>
            <td>
                <a href="{{route('users.edit', ['user' => $user->id])}}" class="btn btn-sm btn-info">Editar</a>
                @if ($loggedId !== intval($user->id))

                <form  class="d-inline" action="{{route('users.destroy', ['user' => $user->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir?')" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger">Excluir </button>
                </form>
               @endif
                
            </td>
        </tr>
    @endforeach
        </tbody>
       
    </table>
    </div>
</div>

{{ $users->links('pagination::bootstrap-4') }}

<table class="table table-hover">
    <thead>
         <tr>
        <th>Nome</th>
        <th>Data</th>
        <th>Entrada</th>
        <th>Saida</th>
        <th>Entrada </th>
        <th>Saida</th>
        
    </tr>
    </thead>
    <tbody>
        @if (count($pontos) > 0)

@foreach ($pontos as $ponto) 
    <tr>
        <td>{{$ponto->name}}</td>
        <td>{{$ponto->datas}}</td>
        <td>{{$ponto->ponto1}}</td>
        <td>{{$ponto->ponto2}}</td>
        <td>{{$ponto->ponto3}}</td>
        <td>{{$ponto->ponto4}}</td>
    </tr>
@endforeach

@else
<td colspan="6" class="text-center">Nenhuma marcação de ponto encontrada  </td>
@endif
    </tbody>
</table>

@endsection