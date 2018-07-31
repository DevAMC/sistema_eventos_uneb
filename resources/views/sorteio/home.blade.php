@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Sorteio</h1>
@stop

@section('content')

<div class="panel panel-danger">
      <div class="panel-body">
        
        <h3 id="numero" class="text-center" style="font-size: 100px; font-weight: 900;">12</h3>
        <h3 class="text-center" style="font-size: 50px; font-weight: 900; color:goldenrod; color:lightseagreen;">12</h3>
        <h3 class="text-center" style="font-size: 30px; font-weight: 900; color:goldenrod; ">12</h3>
            
            
            <button id="alterarValor" type="button" class="btn btn-default">button</button>
            
      </div>
</div>
@stop


@push('js')

<script>
      sortear();
      function sortear() {
            var numero = document.getElementById('numero');
            var min = 1;
            var max = 20;
            var duração = 5000; // 5 segundos

            for (var i = min; i <= max; i++) {
            setTimeout(function(nr) {
                  numero.innerHTML = nr;
            }, i * 5000 / max, i);
            }
      };

      $("#voltarValor").click(function() {
            $("#numero").text("1");
      });
</script>

@endpush
