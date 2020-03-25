@if ($objetojs->component == 'modaljs')
<script>
$('#comentModal').on('show.bs.modal', function (e) {
var button = $(e.relatedTarget)
var recipient = button.data('id')
var modal = $(this)
modal.find('.modal-body #recipient').val(recipient)
})
</script>
@endif


