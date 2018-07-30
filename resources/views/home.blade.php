@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Encontro de Educação - 04/08/2018 - 10/08/2018</h1>
@stop

@section('content')
    
    <div class="panel panel-danger">
          <div class="panel-heading">
                <h3 class="panel-title">Bipar</h3>
          </div>
          <div class="panel-body">

            
            <div class="col-md-12">
                <h2 class="text-center" style="font-weight: 900;">Nome do cristão</h2>
                <p class="text-center" style="font-weight: 600;"> Campo </p>
            </div>
            
                <input 
                    style="font-size: 30px; padding: 40px; text-align: center; font-weight: 900;"
                    type="identificador" 
                    id="identificador" 
                    class="form-control" 
                    required="required" 
                    onenter
                    placeholder="Digite ou passe o identificador">
            <br>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Tudo ok!</strong> Participante validado...
            </div>
            
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Desculpa!</strong> Este participante não está cadastrado...
            </div>
            
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ops!</strong> Esse participante já foi bipado...
            </div>

          </div>          
    </div>


    
    <div class="panel panel-info">
          <div class="panel-heading">
                <h3 class="panel-title">Resumo</h3>
          </div>
          <div class="panel-body">
                <div class="col-md-6">                    
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>iden</th>
                                <th>nome</th>
                                <th>campo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#1</td>
                                <td>Meirinho</td>
                                <td>UNeB</td>
                            </tr>
                            <tr>
                                <td>#1</td>
                                <td>Meirinho</td>
                                <td>UNeB</td>
                            </tr>
                            <tr>
                                <td>#1</td>
                                <td>Meirinho</td>
                                <td>UNeB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <p>Qnt total de participantes: <b>0</b></p>
                    <p>Qnt total de participantes presentes: <b>0</b></p>
                    <p>Qnt total de participantes bipados: <b>0</b></p>
                </div>
          </div>
    </div>
    
    
@stop

@push('js')
<script>
    
    function bipar_participante(id){
        console.log(id);
    }

</script>
@endpush