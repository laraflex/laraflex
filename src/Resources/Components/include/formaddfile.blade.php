<!-- Modal ------------------>
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addFileModal">{{ __('Add a file') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <div class="modal-body">
        <div class="p-3" if="inputFile">
        <form action="{{$util->toRoute('file/add')}}" method="post" enctype="multipart/form-data" id="addfile">
        @csrf
            <div class="p-2">
            <input class="form-control" type="text" placeholder="{{__('File Name')}}" name="filename" id="fileName">
            </div>
            <div class="p-2">
            <input type="file" class="form-control-file" id="file" class="file" name="file" required>
            </div>
            <input type="hidden" class="path" id="path" name="path" value="{{$storageManager->path}}">
            @if (!empty($storageManager->filesystem->disk))
            <input type="hidden" class="disk" id="disk" name="disk" value="{{$storageManager->filesystem->disk}}">
            @endif
            @if (!empty($storageManager->filesystem->privateDir))
            <input type="hidden" class="dir" id="dir" name="dir" value="{{$storageManager->filesystem->privateDir}}">
            @endif
            <div class="p-2">
            <button type="button" class="btn btn-sm btn-secondary mt-3" data-dismiss="modal">{{__('Cancel')}}</button>
            <button type="submit" class="btn btn-sm px-4 btn-light btn-outline-secondary mt-3">{{ __('Submit') }}</button>        
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>

<!-- End Modal ------------------->