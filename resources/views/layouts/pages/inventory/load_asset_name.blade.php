<option disabled selected>--Select--</option>
@foreach($anotherField as $row)
    <option value="{{ $row->id }}">{{ $row->asset_name }}</option>
@endforeach
