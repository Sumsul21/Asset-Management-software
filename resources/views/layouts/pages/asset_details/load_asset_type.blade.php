<option value="">select a type name</option>
@foreach($assetType as $item)
    <option value="{{ $item->id}}">{{ $item->type_name}}</option>
@endforeach