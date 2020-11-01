<!-- Modal ------------------>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    @if(!empty($user))
    <h6 class="modal-title" id="ModalLabel">
        <img src="{{url('local/images/icons/users.png')}}" class="mr-2 ml-3" style="width:40px; height:40px;">
        {{$user->name}}</h6>
    @endif
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <div class="p-3">
    <div class="pb-3">
    {{__('Do you really want to delete this file?')}}
    </div>
    <div class="row">
    <div class="col-2">
    <img class="card-img" id="image-modal">
    </div>
    <div id="text-modal" class="col-10">
    </div>
    </div>
    <form method="post" id="delete-file">
    @csrf
    <input type="hidden" id="path-modal" name="path">
    <input type="hidden" id="disk-modal" name="disk">
    <div class="p-0">
    <button type="submit" class="btn btn-sm px-4 btn-light btn-outline-secondary mt-3" onclick="action='{{$routeDelete}}';">
    {{ __('Confirm') }}
    </button>
    <button type="button" class="btn btn-sm btn-secondary mt-3" data-dismiss="modal">{{__('Cancel')}}</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>
<!-- End Modal ------------------->
