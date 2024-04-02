<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Asset Details Edit</h4>
                    <a href="{{ route('asset_details.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <!-- this is from -->
                        <form class="form-valide mr-3" action="{{route('asset_details.update', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Group Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                            <select class="form-control dropdwon_select" name="ast_grp_id" id="groupName">
                                                    @foreach ($grp_name as $row)
                                                        <option value="{{$row->id}}" {{$row->id == $data->ast_grp_id ? 'selected' : '' }}>{{$row->group_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Type Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="form-control dropdwon_select" name="ast_typ_id" id="typeName">
                                                    @foreach ($grp_type as $row)
                                                        <option value="{{$row->id}}" {{$row->id == $data->ast_typ_id ? 'selected' : '' }}>{{$row->type_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Details Code
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="details_code" class="form-control text-capitalize @error('asset_code') is-invalid @enderror" name="asset_code" value="{{$data->asset_code}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Dep Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="form-control dropdwon_select" name="dep_id" id="editDepLife" required>

                                                    @foreach ($dep_name as $row)
                                                        <option value="{{$row->id}}" {{ $data->id == $row->id ? 'selected' : '' }} >{{$row->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row newInputField" style="display:none;">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label" style="font-weight: bold;">Life Time</label>
                                            <div class="col-md-6">
                                                <!-- Replace label with input field -->
                                                <input type="text" class="lifeTimeInput form-control" data-type="life_time" readonly style="font-weight: bold;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Part No
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="part_no" class="form-control text-capitalize @error('detail_code') is-invalid @enderror" name="part_no" value="{{$data->part_no}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Initial</label>
                                            <span class="text-danger">*</span>
                                            <div class="col-md-6">

                                                <input type="text" id="initial" class="form-control @error('initial') is-invalid @enderror" name="initial" value="{{$data->initial}}" readonly>
                                                @error('initial')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Code Length
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="number" id="code_length" class="form-control @error('code_length') is-invalid @enderror" name="code_length" value="{{$data->code_length}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Asset Name</label>
                                            <span class="text-danger">*</span>
                                            <div class="col-md-6">
                                                <input type="text" id="asset_name" class="form-control @error('asset_name') is-invalid @enderror" name="asset_name" value="{{$data->asset_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-6">
                                                <textarea class="text form-control" id="description" name="description" rows="1">{{$data->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    $(document).on('change','#groupName', function(){
        var id = $(this).val();

        $.ajax({
            url:'{{ route('edit-asset-type')}}',
            method:'GET',
            dataType:'HTML',
            data:{'type_id':id},
            success:function(){
                $('#typeName').html(data);
            }
        });
    });
</script>

<script>
    $(document).on('change','#typeName', function(){
        var id = $(this).val();

        $.ajax({
            url:'{{ route('edit-asset-details-code')}}',
            method:'GET',
            dataType:"JSON",
            data:{'type_id':id},
            success:function(data){
                $('#details_code').val(data);
            }
        });

    });
</script>



<script>
    // jQuery code to handle the change event on the asset code dropdown
    $(document).ready(function () {
        $('#editDepLife').change(function () {
            var selectedValue = $(this).val();

            // Check if a valid asset code is selected
            if (selectedValue !== "") {
                // Show all elements with the class newInputField
                $('.newInputField').show();
            } else {
                // Hide all elements with the class newInputField if no asset code is selected
                $('.newInputField').hide();
            }
        });
    });
</script>

<script>

    $(document).on('change','#editDepLife', function(){
        var id = $(this).val();
        // alert(id);

        $.ajax({
            url: '{{ route('get-life-time') }}',
            method: 'GET',
            dataType: "JSON",
            data: {'type_id': id},
            success: function (data) {
                // Assuming the class of the input field is 'lifeTimeInput'
                var lifeTimeInput = $('.lifeTimeInput');

                // Set the value of the input field based on the data received
                lifeTimeInput.val(data.data.life_time);
            }
        });

    });
</script>
