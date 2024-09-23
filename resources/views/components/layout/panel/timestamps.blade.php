{{--CREATED_AT--}}
@cell('created_at', $item)
<span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->created_at) : $item->created_at }}</span>
@endcell

{{--UPDATED_AT--}}
@cell('updated_at', $item)
<span dir="ltr">{{ \App\Support\Help::isRTL() ? jdate($item->updated_at) : $item->updated_at }}</span>
@endcell
