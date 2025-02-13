{{--This component should only be added with PHP include--}}
@if(!empty($navBar->route))
<a class="navbar-brand " href="{{$util->toRoute($navBar->route)}}">
<img src="{{$logo}}" width="170" height="42">
</a>
@else
<img src="{{$logo}}" width="170" height="42">
@endif
