@if ($objetojs->component == 'storagejs')
@php
    $fileSize = config('laraflex.defaultconfig.fileSizeUpload') * 1000;
    //dd($fileSize);
@endphp

<script>
    function confirmar(){
   // retorna true se confirmado, ou false se cancelado
        return confirm('Tem certeza que quer deletar este arquivo?');
    }

const input = document.getElementById('fileStorage');

  input.addEventListener('change', (event) => {
  const fileSize = {{$fileSize}};
  const file = event.target.files[0];
  const maxSizeInBytes = fileSize * 1024; // 1MB

  if (file.size > maxSizeInBytes) {
    alert('O tamanho do arquivo excede o limite permitido.');
    input.value = ''; // Limpa o input
    return;
  }

  // Prossiga com o envio do arquivo se o tamanho estiver ok
  // ...
});
</script>
@endif
