@if (!empty($objetojs) && $objetojs->component == 'paneljs')
<script type="text/javascript">

function incrementaValor(valorMaximo){
var value = parseInt(document.getElementById('increment').value,10);
value = isNaN(value) ? 0 : value;
    if(value >= valorMaximo) {
        value = valorMaximo;
    }else{
        value++;
    }
    document.getElementById('increment').value = value;
}

function decrementaValor(valorMinimo){
var value = parseInt(document.getElementById('increment').value,10);
value = isNaN(value) ? 1 : value;
    if(value <= valorMinimo) {
        value = 1;
    }else{
        value--;
    }
    document.getElementById('increment').value = value;
}

</script>
@endif