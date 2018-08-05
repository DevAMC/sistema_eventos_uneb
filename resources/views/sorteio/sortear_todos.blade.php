@extends('adminlte::page')

@section('content_header')
    <h1>Sorteio</h1>
@stop

@section('content')

<div class="panel panel-danger">
      <div class="panel-body">
        <h3 id="numero" class="text-center" style="font-size: 100px; font-weight: 900;"> </h3>
        <h3 id="nome" class="text-center" style="font-size: 50px; font-weight: 900; color:goldenrod; color:lightseagreen;"> </h3>
        <h3 id="campo" class="text-center" style="font-size: 30px; font-weight: 900; color:goldenrod; "> </h3>
       <button onclick="sortear()" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> Sortear</button>
      </div>
</div>

<p>Este tipo de sorteio sorteará todos os participantes deste evento, não realizando filtro entre labels.</p>
@stop


@push('js')

<script>
      var numero = document.getElementById('numero');
      var nome = document.getElementById('nome');
      var campo = document.getElementById('campo');
      var min = 1;
      var max = 10000;
      
      function sortear() {
            nome.innerHTML = '';
            campo.innerHTML = '';
            $.ajax({
                  url: '/sorteios/acao/todos'
            }).done(function (response) {
                  console.log(response);
                  if(response.status == "sorteio ok"){
                        for(var i = 0; i < max; i++){
                              setTimeout(function (nr) {
                                    numero.innerHTML = Math.floor(Math.random() * 1000)
                              }, 0, 100);
                        }
                        setTimeout(function (nr) {
                              numero.innerHTML = response.participante[0].identificador;
                              nome.innerHTML = response.participante[0].nome;
                              campo.innerHTML = response.participante[0].campo;
                        }, 0);

                        console.log(response.participante[0].identificador);
                  }else{
                        numero.innerHTML = 'NENHUM<BR>PARTICIPANTE';
                  }      
            }).fail(function (erro) {
                  alert('Desculpa, não foi possível realizar o sorteio. Verifique se sua conexão está funcionando.');
            });
            
            

      };

    

</script>

@endpush
