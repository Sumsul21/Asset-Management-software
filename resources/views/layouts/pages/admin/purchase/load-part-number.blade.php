
<option>Select a Part No</option>
@foreach($datas as $item)
    <option value="{{ $item->id}}">{{ $item->part_no}}</option>
@endforeach