
@if(!empty($objectConfig->dependencies))

@foreach ($objectConfig->dependencies as $objetojs)
{{-- Verifica se as dependências são do tipo scriptjs --}}
@if ($objetojs->type == 'scriptjs')
{{--Verifica se o script já foi incluído ---------}}
    @php
        $componentsjs[] = $objetojs;
    @endphp

    @if(!empty($objetojs->lib))
    @php
        $arrayImports = array();
    @endphp
    @if (!in_array($objetojs->lib, $arrayImports))

    {{-- Inclusão de script JQuery ou javascript --}}
     <script src="{!!$objetojs->lib!!}"></script>

    @php
    $arrayImports[] = $objetojs->lib;
    @endphp
    @endif
    @endif
@endif
@endforeach
{{---------------------------------------------}}
    @if (!empty($componentsjs))

        @foreach($componentsjs as $objetojs)
                @if(!empty($objetojs->component))
                    @if(!empty($objetojs->pathContent))
                    @include($objetojs->pathContent . '.' . $objetojs->component)
                    @else
                    @include('laraflexscript::' . $objetojs->component)
                    @endif
                @endif
        @endforeach
    @endif

@endif



