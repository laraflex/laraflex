@if ($objetojs->component == 'storagejs')
<script>
    function setaDadosModal(image,fileName,path,disk) {
        document.getElementById('image-modal').src = image;
        document.getElementById('path-modal').value = path;
        document.getElementById('disk-modal').value = disk;
        document.getElementById('text-modal').innerHTML = fileName;
    }
</script>
@endif