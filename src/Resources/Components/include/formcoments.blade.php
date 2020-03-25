<!-- Modal ------------------>
<div class="modal fade" id="comentModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    @if(!empty($user))
    <h6 class="modal-title" id="ModalLabel">
        <img src="{{url('images/icons/message.png')}}" class="mr-2 ml-3" style="width:40px; height:40px;">
        {{$user->name}}</h6>
    @endif
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <div class="p-3">
    <form action="{{$util->toRoute('coment/add')}}" method="post"  id="addcoment" class="">
    @csrf
    <div class="form-group">
    <textarea class="form-control" id="coment" rows="5" name="coment" placeholder="{{__('Make your comment')}}" required></textarea>
    </div>
    <input type="hidden" class="article" id="article" name="articleId" value="{{$contentbox->data->id}}">

    <input type="hidden" class="recipient" id="recipient" name="comentId">
    <div class="p-0">
    <button type="submit" class="btn btn-sm btn-light btn-outline-secondary mt-3">{{ __('Save your comment') }}</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>
<!-- End Modal ------------------->
