@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>{{$label_selecionado[0]->evento->evento }} - {{$label_selecionado[0]->label}}</h1>
@stop

@section('content')

    <div class="panel panel-danger">
          <div class="panel-heading">
                <h3 class="panel-title">Validação</h3>
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
            <div style="display: none;" id="participante_validado" class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Tudo ok!</strong> Participante validado...
            </div>
            
            <div style="display: none;" id="participante_nao_cadastrado" class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Desculpa!</strong> Este participante não está cadastrado...
            </div>
            
            <div style="display: none;" id="participante_ja_validado" class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Ops!</strong> Esse participante já foi validado...
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
    $(document).keypress(function (e) {
        if(e.which == 13){

            //pega valor do input e em seguida limpa o mesmo
            var val = $('#identificador').val();
            $('#identificador').val('');

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            //faz requisição ajax
            $.ajax({
                url: "/validacao",
                method: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    _token: '{{csrf_token()}}',
                    id: val 
                }
            }).done(function (response){
                if(response.status == 'ok'){
                    $('#participante_validado').css('display', 'block');
                    $('#participante_ja_validado').css('display', 'none');
                    $('#participante_nao_cadastrado').css('display', 'none');

                }else if(response.erro == 'ja validado'){
                    $('#participante_ja_validado').css('display', 'block');
                    $('#participante_validado').css('display', 'none');
                    $('#participante_nao_cadastrado').css('display', 'none');

                }else{
                    $('#participante_nao_cadastrado').css('display', 'block');
                    $('#participante_ja_validado').css('display', 'none');
                    $('#participante_validado').css('display', 'none');
                }
            }).fail(function (response) {
                
            });

            //printa no log
            console.log(val);
        }
    });

</script>
@endpush