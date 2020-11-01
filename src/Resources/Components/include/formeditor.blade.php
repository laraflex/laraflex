<!-- Modal editor------------------>
<div class="modal fade" id="addResponseModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        @if(!empty($user))
        <h6 class="modal-title" id="ModalLabel">
            <img src="{{$util->toImage('local/images/icons/message.png')}}" class="mr-2 ml-3" style="width:40px; height:40px;">
            @if(!empty($user->name))
            {{$user->name}}</h6>
            @endif
        @endif
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="p-3">
        <form action="{{$util->toRoute('content/add')}}" method="post"  id="addcoment" class="">
        @csrf
        <div class="form-group">
        <textarea class="form-control summernote" id="summernote" rows="5" name="coment" placeholder="{{__('Add your content')}}" required></textarea>
        </div>
        <input type="hidden" class="article" id="article" name="articleId" value="{{$contentbox->data->id}}">
        @if(!empty($user))
        <input type="hidden" class="author" id="author" name="authorId" value="{{$user->id}}">
        @endif
        <input type="hidden" class="coment" id="recipient" name="comentId">
        <div class="p-0">
        <button type="submit" class="btn btn-sm btn-light btn-outline-secondary mt-3">{{ __('Save your content') }}</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
    </div>
    <!-- End Modal ------------------->
