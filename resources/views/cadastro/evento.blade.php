@extends('adminlte::page')

@section('content_header')
    <h1>Cadastros</h1>
@stop

@section('content')


<div class="panel panel-danger">
      <div class="panel-heading">
            <h3 class="panel-title">Cadastro de evento</h3>
      </div>
      <div class="panel-body">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
             @if (session('status'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('status') }}</li>
                </ul>
            </div>
            @endif
            <form action="/cadastros/eventos" method="POST" role="form">

                <div class="form-group">
                    <label for="">Evento</label>
                    <input name="evento" type="text" class="form-control" id="" placeholder="Insira o código que identifica o participante">
                </div>                
                @csrf
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Cadastrar</button>
            </form>
            
            <br>
            <table id="table_participantes" class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                    <tr>
                        <td>{{$evento->id}}</td>
                        <td>{{$evento->evento}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

      </div>
</div>


@stop


@push('js')
    <script>
        $('#table_participantes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
    </script>
@endpush
