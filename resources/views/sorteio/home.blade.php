@extends('adminlte::page')

@section('content_header')
    <h1>Sorteio</h1>
@stop

@section('content')

<div class="panel panel-danger">
      <div class="panel-body">
        
        <h3 id="numero" class="text-center" style="font-size: 100px; font-weight: 900;"> </h3>
        <h3 class="text-center" style="font-size: 50px; font-weight: 900; color:goldenrod; color:lightseagreen;"> </h3>
        <h3 class="text-center" style="font-size: 30px; font-weight: 900; color:goldenrod; "> </h3>
            
            
            <button id="alterarValor" type="button" class="btn btn-default">button</button>
            
      </div>
</div>
@stop


@push('js')

<script>
      var numero = document.getElementById('numero');
            var min = 1;
            var max = 6000;
            var count = 0;
      sortear();
      function sortear() {
            

            $.ajax({
                  url: ''
            }).done(function (response) {
                  
            }).fail(function (erro) {
                  
            });
            
            // const waitFor = (ms) => new Promise(r => setTimeout(r, ms))
            // [1, 2, 3].forEach(async (num) => {
            //        for (var i = min; i <= max; i++) {
                        // setTimeout(function (nr) {
                        //       numero.innerHTML = Math.floor(Math.random() * 1000)
                        //       await waitFor(50);
                        // }, 0, i);
            //       }
                  
            //       console.log(num)
            // })
            

      };

    

</script>

@endpush
