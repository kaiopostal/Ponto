@extends('adminlte::page')
@section('title','Novo Usuário')
@section('content_header')

<style>
  .digital {
      color: #000000;
      font-size: 80px;
      margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
  }

</style>
<h1>
    Registrar Ponto
</h1>

<div class="digital">--:--:--</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Adicionar nova data
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('save.data')}}" method="POST">
          @csrf
          @method('PUT')
        <div class="modal-body">
          <input type="date" name="data" value="2021-12-12">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          
            <button type="submit" class="btn btn-primary">Adicionar</button>
            
          </form>
          
        </div>
      </div>
    </div>
  </div>

@endsection

@section('content')

@if (session('alert'))
<div class="alert alert-danger">
        {{session('alert')}}
</div>
@endif

@if (session('warning'))
<div class="alert alert-info">
        {{session('warning')}}
</div>
@endif

<div class="card">
    <div class="bodu">
    <table class="table table-hover">
        <thead>
             <tr>
            <th>ID</th>
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
            <td>{{$ponto->id}}</td>
            <td>{{$ponto->datas}}</td>
            <td>
              <a href="/painel/pontosave/{{$ponto->id}}/entrada1" class="btn btn-success">Marcar</a>
            </td>
            <td>
              <a href="/painel/pontosave/{{$ponto->id}}/entrada2" class="btn btn-success">Marcar</a>
            </td>
            <td>
              <a href="/painel/pontosave/{{$ponto->id}}/entrada3" class="btn btn-success">Marcar</a>
            </td>
            <td>
              <a href="/painel/pontosave/{{$ponto->id}}/entrada4" class="btn btn-success">Marcar</a>
            </td>
        </tr>
  @endforeach

    @else
    <td colspan="6" class="text-center">Nenhuma Data encontrada  </td>
    @endif
        </tbody>
    </table>
    </div>
</div>

{{--  {{ $pages->links('pagination::bootstrap-4') }} --}}
       </tbody>
   </table>
       



<script>
    let digitalElement = document.querySelector('.digital');

    function updateClock() {
        let now = new Date();
        let hour = now.getHours();
        let minute = now.getMinutes();
        let second = now.getSeconds();

        digitalElement.innerHTML = `${fixZero(hour)}:${fixZero(minute)}:${fixZero(second)}`;
    }

    function fixZero(time) {
        return time < 10 ? `0${time}` : time;
    }

    setInterval(updateClock, 1000);
    updateClock();

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
