@if ($objetojs->component == 'modaljs')
<script>
$('#addResponseModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget
var recipient = button.data('whatever')
var modal = $(this)
modal.find('#recipient').val(recipient)
})
</script>
@endif
