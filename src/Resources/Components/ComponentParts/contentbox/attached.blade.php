@props(['attached', 'imagePdf', 'attachedLabel'])
<div class="p-0 mt-2" style="width:120px">
<div>
<a href="{{$attached}}" rel="noopener noreferrer" target="_blank">
<img src="{{$imagePdf}}" class="mx-auto d-none d-sm-block float-center" alt="Open the file" widthe=100 height=100 />
</a>
</div>
<div>
<a href="{{$attached}}" rel="noopener noreferrer" target="_blank">
<img src="{{$imagePdf}}" class="mx-auto d-block d-sm-none float-center" alt="Open the file" widthe=70 height=70 />
</a>

</div>
<div class="text-center">{{$attachedLabel}}</div>
</div>
