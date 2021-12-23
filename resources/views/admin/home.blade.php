@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Painel')

@section('content_header')

<h1>Painel de controle</h1>

@endsection

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$visitsCount}}</h3>
                <p>Acessos</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-eye"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$userCount}}</h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-user"></i>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-7">
        <div class="card float-end">
            <div class="card-header">
                <h3 class="cad-title">Sobre o sistema</h3>
            </div>
            <div class="card-body">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum omnis, labore tenetur incidunt nostrum fuga earum minima pariatur voluptate dignissimos magni aperiam eveniet molestiae ducimus tempore recusandae, vero ad quam.</p>
            </div>
        </div>
    </div>
</div>

@endsection
