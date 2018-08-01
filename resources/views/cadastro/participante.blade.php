@extends('adminlte::page')

@section('content_header')
    <h1>Cadastros</h1>
@stop

@section('content')


<div class="panel panel-danger">
      <div class="panel-heading">
            <h3 class="panel-title">Cadastro de participante</h3>
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
            <form action="/cadastros/participantes" method="POST" role="form">

                <div class="form-group">
                    <label for="">Identificador</label>
                    <input name="identificador" type="text" class="form-control" id="" placeholder="Insira o código que identifica o participante">
                </div>
                <div class="form-group">
                    <label for="">Nome</label>
                    <input name="nome" type="text" class="form-control" id="" placeholder="Digite o nome do participante">
                </div>
                <div class="form-group">
                    <label for="">Campo</label>
                    <input name="campo" type="text" class="form-control" id="" placeholder="Digite o campo do participante">
                </div>
                <div class="form-group">
                    <label for="">Evento</label>
                    <select name="id_evento" id="input" class="form-control" required="required">
                        @foreach($eventos as $evento)
                            <option value="{{$evento->id}}">{{$evento->evento}}</option>
                        @endforeach
                    </select>
                    
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
                        <th>Campo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participantes as $participante)
                    <tr>
                        <td>{{$participante->identificador}}</td>
                        <td>{{$participante->nome}}</td>
                        <td>{{$participante->campo}}</td>
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
