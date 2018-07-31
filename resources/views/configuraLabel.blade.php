@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Sistema de eventos - UNeB</h1>
@stop

@section('content')


<div class="panel panel-danger">
      <div class="panel-heading">
            <h3 class="panel-title">Configure os labels antes de continuar</h3>
      </div>
      <div class="panel-body">
        
        <div class="col-md-6">
            @foreach($labels as $label)
            <a href="/selecionaLabelEvento/{{$label->id}}"><button type="button" class="btn btn-default">{{$label->label}}</button></a>
            @endforeach      
        </div>
            
      </div>
</div>


@stop
