


@foreach ($vuejsComponents as $item)
    {{--    componente contentBox Vuejs--}}
    @if ($item->component === 'contentBox')
        @if (!empty($item->dataConfig))
        <flex-content-box data="{{ json_encode($item->dataConfig) }}"></flex-content-box>
        @else
        <flex-content-box></flex-content-box>
        @endif
    {{--    componente comentBox Vuejs--}}
    @elseif($item->component === 'comentBox')
        @if (!empty($item->dataConfig))
        <flex-coment-box data="{{ json_encode($item->dataConfig) }}"></flex-coment-box>
        @else
        <flex-coment-box></flex-coment-box>
        @endif
    @elseif($item->component === 'dataBox')
        @if (!empty($item->dataConfig))
        <flex-data-box data="{{ json_encode($item->dataConfig) }}"></flex-data-box>
        @else
        <flex-data-box></flex-data-box>
        @endif
    @elseif($item->component === 'testBox')
        @if (!empty($item->dataConfig))
        <flex-test-box data="{{ json_encode($item->dataConfig) }}"></flex-test-box>
        @else
        <flex-test-box></flex-test-box>
        @endif

    @endif
@endforeach
<div class="c-loader" v-show="showSpin"></div>
