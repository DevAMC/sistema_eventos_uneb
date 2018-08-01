@extends('adminlte::page')

@section('content_header')
    <h1>{{(!empty($label_selecionado[0]->evento->evento))? $label_selecionado[0]->evento->evento : "evento indisponível"}} 
        - {{(!empty($label_selecionado[0]->label)) ? $label_selecionado[0]->label : "label indisponível"}}</h1>
@stop

@section('content')

    <div class="panel panel-danger">
          <div class="panel-heading">
                <h3 class="panel-title">Validação</h3>
          </div>
          <div class="panel-body">

            
            <div class="col-md-12">
                <h1 id="nome_participante" class="text-center" style="font-weight: 900; color: #ff5722;"> </h1>
                <h3 id="campo_participante" class="text-center" style="font-weight: 600;"> </h3>
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
                    <table id="table" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nome</th>
                                <th>campo</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <p id="qnt_participantes"> </p>
                    <p id="qnt_participantes_presentes"></p>
                    <p id="qnt_participantes_nao_presentes"></p>
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
                    console.log(response);
                if(response.status == 'ok'){
                    $('#participante_validado').css('display', 'block');
                    $('#participante_ja_validado').css('display', 'none');
                    $('#participante_nao_cadastrado').css('display', 'none');
                    carrega_table();

                }else if(response.erro == 'ja validado'){
                    $('#participante_ja_validado').css('display', 'block');
                    $('#participante_validado').css('display', 'none');
                    $('#participante_nao_cadastrado').css('display', 'none');

                    //altera informações do front
                    $('#nome_participante').text('');
                    $('#campo_participante').text('');

                }else{
                    $('#participante_nao_cadastrado').css('display', 'block');
                    $('#participante_ja_validado').css('display', 'none');
                    $('#participante_validado').css('display', 'none');

            //altera informações do front
            $('#nome_participante').text('');
            $('#campo_participante').text('');
        }

            //altera informações do front
            $('#nome_participante').text(response.participante.nome);
            $('#campo_participante').text(response.participante.campo);
            
            $('#qnt_participantes').text('Qnt participantes: '+response.qnt_participante+'');
            $('#qnt_participantes_presentes').text('Qnt participantes presentes: '+response.qnt_participante_presentes+'');
            $('#qnt_participantes_nao_presentes').text('Qnt participantes não presentes: '+response.qnt_participante_nao_presentes+'');

            }).fail(function (response) {
                alert('Falha na requisição, verifique a rede!');
            });

            //printa no log
            console.log(val);
        }
    });

</script>

<script>

    var table = $('#table').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        ajax: {
            url: '/estatisticas',
            dataSrc: 'ultimos_registros'
        },
        columns: [
        {data: 'identificador'},
        {data: 'nome' },
        {data: 'campo' }
            ]
        });
    function carrega_table(){
        table.ajax.reload();
    }
</script>


@endpush