@extends('adminlte::page')



@section('content_header')
    <h1>Relatórios</h1>
@stop

@section('content')

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Todos participantes</h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Participantes validados</h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Participantes sorteados</h3>
    </div>
    <div class="panel-body">
        Panel content
    </div>
</div>

@stop


@push('js')

</script>

@endpush
