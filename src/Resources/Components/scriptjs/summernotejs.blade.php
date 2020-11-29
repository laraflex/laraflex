@if ($objetojs->component == 'summernotejs')

@php
{
    $summernote = $objetojs;
    if(!empty($summernote->insertImage) && $summernote->insertImage == true){
        $insertImage = 'picture';
    }else{
        $insertImage = '';
    }
}
@endphp

<script type="text/javascript">
$(document).ready(function() {

    $('.summernote').summernote({

        height: 400,
        fontSizes:['8', '10', '12', '14', '16', '18', '20', '24', '28', '36'],
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['forecolor', ['forecolor']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            @if($insertImage == 'picture')
            ['insert', ['link', 'unlink', 'codeview', 'video','hr', 'picture']]
            @else
            ['insert', ['link', 'unlink', 'codeview', 'video', 'hr']]
            @endif
        ],
        image: [
           ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
           ['float', ['floatLeft', 'floatRight', 'floatNone']],
           ['remove', ['removeMedia']]
  ],

    });
    $('.summernote').summernote({
     height:300,
     onImageUpload: function(file, editor, welEditable) {
      sendFile(file[0],editor,welEditable);
    }
    });

    $('#summernote').summernote('lineHeight', 1.5);
    $('#summernote').summernote('fontSize', 16);
    $('#summernote').summernote('fontName', 'Arial');
});

</script>

<script type="text/javascript">
    function sendFile(file, editor, welEditable) {
      data = new FormData();
      data.append("file", file);
      url = "{{url('upload')}}";
      $.ajax({
        data: data,
        type: "POST",
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function (url) {
          editor.insertImage(welEditable, url);
        }
      });
}
</script>

@endif
