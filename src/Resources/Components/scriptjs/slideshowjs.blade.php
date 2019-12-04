@if (!empty($objetojs) && $objetojs->component == 'slideshowjs')
<script type="text/javascript">
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
event.preventDefault();
@if(!empty($objetojs->arrowColor) && $objetojs->arrowColor == true)
$(this).ekkoLightbox({leftArrow:'<span class="arrow">&#10094;</span>',rightArrow:'<span class="arrow">&#10095;</span>'});
@else
$(this).ekkoLightbox();
@endif
});
</script>
@endif
