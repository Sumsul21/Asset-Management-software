<option disabled selected>--Select--</option>
@foreach($data as $row)
    <option value="{{ $row->id }}">{{ $row->type_name }}</option>
@endforeach
