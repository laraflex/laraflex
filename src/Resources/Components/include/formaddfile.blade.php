<!-- Modal ------------------>
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addFileModal">{{ __('Add a file') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

            </button>
            </div>
        <div class="modal-body">
        <div class="p-3" if="inputFile">
        <form action="{{$util->toRoute($routeAddFile)}}" method="post" enctype="multipart/form-data" id="addfile">
        @csrf
            <div class="p-2">
            <input class="form-control" type="text" placeholder="{{__('File Name')}}" name="filename" id="fileName" required>
            </div>
            <div class="p-2">
            <input type="file" class="form-control-file" id="fileStorage" class="file" name="file" accept=".pdf, .doc,.docx, .jpg, .jpeg, .png, .webp, .mp4" required>
            </div>
            <input type="hidden" class="path" id="path" name="path" value="{{$storageManager->filesystem->path}}">
            @if (!empty($storageManager->filesystem->disk))
            <input type="hidden" class="disk" id="disk" name="disk" value="{{$storageManager->filesystem->disk}}">
            @endif
            @if (!empty($storageManager->filesystem->privateDir))
            <input type="hidden" class="dir" id="dir" name="dir" value="{{$storageManager->filesystem->privateDir}}">
            @endif
            <div class="p-2">
            <button type="submit" class="btn btn-sm px-4 btn-light btn-outline-secondary mt-3">{{ __('Submit') }}</button>
            <button type="button" class="btn btn-sm btn-secondary mt-3" data-bs-dismiss="modal">{{__('Cancel')}}</button>
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>


<!-- End Modal ------------------->
