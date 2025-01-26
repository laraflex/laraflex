@props(['vueAction', 'id'])
<a href="#" class="btn btn-sm btn-outline-dark mt-2" v-on:click="{{$vueAction}}('{{$id}}')" >{{__('Read more')}}</a>
