@if (!empty($objetojs) && $objetojs->component == 'slideshowjs')
{{--

<script type="text/javascript">
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
event.preventDefault();
$(this).ekkoLightbox();
});

@if(!empty($objetojs->arrowColor) && $objetojs->arrowColor == true)
$(this).ekkoLightbox({leftArrow:'<span class="arrow"><span class="badge badge-pill badge-light px-2 py-1" style="background-color: rgb(255,255,255,0.6);">&#10094;</span></span>',rightArrow:'<span class="arrow"><span class="badge badge-pill badge-light px-2 py-1" style="background-color: rgb(255,255,255,0.6);">&#10095;</span></span>'});
@else
$(this).ekkoLightbox();
@endif
});

</script>
--}}
@endif
