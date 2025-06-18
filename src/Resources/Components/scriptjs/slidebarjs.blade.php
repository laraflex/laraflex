@if (!empty($objetojs) && $objetojs->component == 'slidebarjs')
<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function () {
    var multiSlides = document.querySelector('.js_variablewidth');
    lory(multiSlides, {
        slidesToScroll: 2,
        slideSpeed: 600,
        rewind: true,
        rewindSpeed:300

    });
});

</script>
@endif

