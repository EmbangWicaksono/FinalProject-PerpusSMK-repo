{{$books}}
@foreach ($books as $item)
    {{$item->author()->get()}}
@endforeach