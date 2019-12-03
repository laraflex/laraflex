
@if(!empty($objectConfig->dependencies))

    @foreach ($objectConfig->dependencies as $objetojs)
            {{-- Verifica se as dependências são do tipo scriptjs --}}
            @if ($objetojs->type == 'scriptjs')

                {{--Verifica se o script já foi incluído ---------}}
                @if(!empty($objetojs->lib))
                @php
                $arrayImports = array();
                @endphp
                @if (!in_array($objetojs->lib, $arrayImports))
{{-- Inclusão de script JQuery ou javascript --}}
<script src="{{$objetojs->lib}}"></script>
                @php
                    $arrayImports[] = $objetojs->lib;
                @endphp
                @endif
                @endif
{{---------------------------------------------}}
                @if(!empty($objetojs->component) && $objetojs->component != NULL)
                    @if(!empty($objetojs->pathContent))
                    @include($objetojs->pathContent . '.' . $objetojs->component)
                    @else
                    @include('laraflexscript::' . $objetojs->component)

                    @endif
                @endif
            @endif


    @endforeach

@endif



