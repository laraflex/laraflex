
    <!-- Modal ------------------>
    <div class="modal fade" id="addFolderModal" tabindex="-2" role="dialog" aria-labelledby="addFolderModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addFolderModal">{{ __('Add a folder') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
            <div class="p-3" if="inputFile">
            <form action="{{$util->toRoute($routeAddFile)}}" method="post" enctype="multipart/form-data" id="addfile">
            @csrf
                <div class="p-2">
                <input class="form-control" type="text" placeholder="{{__('Folder name')}}" name="filename" id="fileName" required>
                </div>
                <input type="hidden" class="path" id="path" name="path" value="{{$storageManager->path}}">
                @if (!empty($storageManager->filesystem->disk))
                <input type="hidden" class="disk" id="disk" name="disk" value="{{$storageManager->filesystem->disk}}">
                @endif
                @if (!empty($storageManager->filesystem->privateDir))
                <input type="hidden" class="dir" id="dir" name="dir" value="{{$storageManager->filesystem->privateDir}}">
                @endif
                <div class="p-2">
                <button type="submit" class="btn btn-sm px-4 btn-light btn-outline-secondary mt-3">{{ __('Submit') }}</button>
                <button type="button" class="btn btn-sm btn-secondary mt-3" data-dismiss="modal">{{__('Cancel')}}</button>
                </div>
            </form>
            </div>
            </div>
            </div>
        </div>
    </div>
    <!-- End Modal ------------------->
