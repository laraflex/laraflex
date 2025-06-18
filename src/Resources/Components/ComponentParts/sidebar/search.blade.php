
<div class="sidebar-search mb-2">
    <!--div -->
    <form class="form-inline" method="post" action="{{$util->toRoute($action)}}" id="search-form">
    <div class="input-group " style="width:100%;">
    <input type="text" class="form-control-sm search-menu mx-0 ms-2 me-2 {{$border}} rounded" id="search" name="search" placeholder="Search..." style="width:78%;" required>
    @csrf
    <div class="input-group-append me-1">
    <button type="submit" class="btn m-0 p-0 me-0" role="button">
    <span class="input-group-text py-2">
    <i class="fas fa-search" aria-hidden="true"></i>
    </span>
    </button>
    </div>

    </div>
    </form>
    <!--/div -->
</div>
