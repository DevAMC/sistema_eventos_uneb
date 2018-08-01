@extends('adminlte::page')

@section('content_header')
    <h1>Sistema de eventos - UNeB</h1>
@stop

@section('content')

<div class="panel panel-danger">
      <div class="panel-heading">
            <h3 class="panel-title">Cria uma nova label</h3>
      </div>
      <div class="panel-body">
        
            <form action="/criaLabelEvento" method="POST" role="form">
            *Label: identificador de acontecimentos do evento.
            <br>
            <br>
                <div class="form-group">
                    <label for="">Nome do Label</label>
                    <input type="text" class="form-control" name="label" placeholder="Digite aqui!">
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
            </form>
            
            
      </div>
</div>

<div class="panel panel-danger">
      <div class="panel-heading">
            <h3 class="panel-title">Selecione uma label</h3>
      </div>
      <div class="panel-body">
        
        <div class="col-md-6">
            @foreach($labels as $label)
            <a href="/selecionaLabelEvento/{{$label->id}}/{{$label->evento->id}}"><button type="button" class="btn btn-default"><i class="fa fa-hashtag" aria-hidden="true"></i>{{$label->evento->evento}} - <b>{{$label->label}}</b></button></a>
            @endforeach      
        </div>
            
      </div>
</div>


@stop
