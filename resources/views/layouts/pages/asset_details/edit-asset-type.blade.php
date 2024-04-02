<option value="{{$row->id}}">Select a Type Name</option>
@foreach($assetType as $item)
    <option value="{{ $item->id}}">{{ $item->type_name}}</option>
@endforeach