@if (!empty($objetojs) && $objetojs->component == 'modaljs')

<script type="text/javascript">
const comentModal = document.getElementById('comentModal')
comentModal.addEventListener('show.bs.modal', event => {
const button = event.relatedTarget
const recipient = button.getAttribute('data-bs-whatever')
const modalBodyInput = comentModal.querySelector('.recipient')
modalBodyInput.value = recipient
})
</script>
@endif


