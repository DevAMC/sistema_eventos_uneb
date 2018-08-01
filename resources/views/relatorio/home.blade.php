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
        
        <table id="table_participantes" class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Campo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Participantes validados</h3>
    </div>
    <div class="panel-body">
        
        <table id="table_participantes_validados" class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Campo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Participantes sorteados</h3>
    </div>
    <div class="panel-body">
        
        <table id="table_participantes_sorteados" class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Campo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>

@stop


@push('js')

<script>
    $(document).ready(function () {
        $('#table_participantes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
        $('#table_participantes_validados').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
        $('#table_participantes_sorteados').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            }
        });
    });
</script>

@endpush
