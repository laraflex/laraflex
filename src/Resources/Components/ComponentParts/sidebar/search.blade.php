
<div class="sidebar-search">
    <div>
    <form class="form-inline" method="post" action="{{$util->toRoute($action)}}" id="search-form">
    <div class="input-group " style="width:100%">
    <input type="text" class="form-control search-menux mx-0 mr-1 rounded" id="search" name="search" placeholder="Search..." style="width:80%;">
    @csrf
    <div class="input-group-append mr-1">
    <button type="submit" class="btn m-0 p-0 mr-1" role="button">
    <span class="input-group-text py-2">
    <i class="fas fa-search" aria-hidden="true"></i>
    </span>
    </button>
    </div>

    </div>
    </form>
    </div>
</div>
