<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Asset Details</h4>
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
                        <form class="form-valide mr-3" action="{{ route('asset_details.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Group Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <select class="form-control dropdwon_select" id="groupName" name="ast_grp_id" required>
                                                    <option selected disabled value="">Please Select Group Name</option>
                                                    @foreach ($ast_grp as $row)
                                                        <option value="{{$row->id}}">{{$row->group_name}}</option>
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
                                                <select class="form-control dropdwon_select" id="getTypeName" name="ast_typ_id" required>
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
                                                <input type="text" id="details_code" class="form-control text-capitalize @error('detail_code') is-invalid @enderror" name="asset_code" value="{{old('asset_code')}}" readonly>
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
                                                <select class="form-control dropdwon_select" id="getDepLife" name="dep_id" required>
                                                    <option selected disabled value="">Please Select Dep Name</option>
                                                    @foreach ($dep_name as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
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
                                                <input type="text" id="part_no" class="form-control text-capitalize @error('detail_code') is-invalid @enderror" name="part_no" value="{{old('part_no')}}">
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
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="initial" name="initial" value="1" readonly>
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
                                                <input type="number" id="code_length" class="form-control text-capitalize @error('code_length') is-invalid @enderror" name="code_length" value="{{old('code_length')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Asset Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="asset_name" class="form-control @error('asset_name') is-invalid @enderror" name="asset_name" value="{{old('asset_name')}}">
                                                @error('asset_name')
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
                                            <label for="" class="col-md-4 col-form-label">Description</label>
                                            <div class="col-md-6">
                                                <textarea class="text form-control" id="description" name="description" rows="1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
            url:'{{ route('get-asset-type')}}',
            method:'GET',
            dataType:"HTML",
            data:{'type_id':id},
            success:function(data){
                $('#getTypeName').html(data);
            }
        });

    });
</script>

<script>
    $(document).on('change','#getTypeName', function(){
        var id = $(this).val();

        $.ajax({
            url:'{{ route('get-asset-details-code')}}',
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
    $(document).ready(function () {
        $('#getDepLife').change(function () {
            var selectedValue = $(this).val();

            if (selectedValue !== "") {
                $('.newInputField').show();
            } else {
                $('.newInputField').hide();
            }
        });
    });
</script>

<script>

    $(document).on('change','#getDepLife', function(){
        var id = $(this).val();
        // alert(id);

        $.ajax({
            url: '{{ route('get-life-time') }}',
            method: 'GET',
            dataType: "JSON",
            data: {'type_id': id},
            success: function (data) {
                var lifeTimeInput = $('.lifeTimeInput');

                lifeTimeInput.val(data.data.life_time);
            }
        });

    });
</script>
