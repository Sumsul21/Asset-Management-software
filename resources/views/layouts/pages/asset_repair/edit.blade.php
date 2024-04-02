<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Edit Asset Repair</h4>
                    <a href="{{ route('ast_repair.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        </div>
                        <!-- this is from -->
                        <form class="form-valide" action="{{route('ast_repair.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="" class="col-md-4 col-form-label">Asset Code
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="asset_transactions_id" id="getTransaction" value="{{$data->assetTransaction->id}}">

                                                        <input type="text" class="form-control" value="{{$data->assetTransaction->asset_code}}" disabled>
                                                        @error('asset_transactions_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <select class="form-control dropdwon_select" id="getTransaction" name="asset_transactions_id" required>
                                                            <option selected disabled value="">Please Select Asset Code</option>
                                                            @foreach ($transaction as $row)
                                                            <option value="{{$row->id}}" {{$row->id == $data->asset_transactions_id ? 'selected' : '' }}>{{$row->asset_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-md-4 col-form-label">Repair Date
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="date" name="repair_date" id="repair_date" class="form-control"  value="{{$data->repair_date}}">
                                                            @error('leave_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-md-4 col-form-label">Repair Amount
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="number" name="repair_amount" id="repair_amount" class="form-control @error('repair_amount') is-invalid @enderror" placeholder="0.00" value="{{$data->repair_amount}}">
                                                            @error('repair_amount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-md-4 col-form-label">Repair Details
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <textarea class="text form-control" id="repair_details" name="repair_details" rows="2">{{$data->repair_details}}</textarea>
                                                             @error('repair_details')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 newInputField">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong> Group Name :</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="group_name">{{ $data->assetTransaction->assetDetails->assetGroup->group_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Type Name:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="type_name">{{ $data->assetTransaction->assetDetails->assetType->type_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Asset Name:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="asset_name">{{ $data->assetTransaction->assetDetails->asset_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Book Value:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="book_value">{{ $data->assetTransaction->book_value }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Org Value:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="org_value">{{ $data->assetTransaction->org_value }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Register Date:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="start_date">{{ $data->assetTransaction->start_date }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>End LIfe Date:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="end_date">{{ $data->assetTransaction->end_date }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- submit button -->
                                    <div class="col-xl-12">
                                        <div class="col-lg">
                                            <button type="submit"
                                                class="btn btn-success btn-sm float-right mr-3">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    {{-- <script>
        $(document).on('change', '#getTransaction', function () {
            var id = $(this).val();
            alert(id);

            $.ajax({
                url: '{{ route('get-asset-tran-info')}}',
                method: 'GET',
                dataType: "JSON",
                data: { 'type_id': id },
                success: function (data) {
                    // Iterate over all elements with the class tranInfo and set the content
                    $('.tranInfo').each(function (index, element) {
                        // Assuming you have a data attribute on the element to identify the type of data
                        var dataType = $(element).data('type');

                        // Set the content based on the data type
                        switch (dataType) {
                            case 'group_name':
                                $(element).text(data.data.group_name);
                                break;
                            case 'type_name':
                                $(element).text(data.data.type_name);
                                break;
                            case 'asset_name':
                                $(element).text(data.data.asset_name);
                                break;
                            case 'book_value':
                                $(element).text(data.data.book_value);
                                break;
                            case 'org_value':
                                $(element).text(data.data.org_value);
                                break;
                            case 'serial_no':
                                $(element).text(data.data.serial_no);
                                break;
                            case 'part_no':
                                $(element).text(data.data.part_no);
                                break;
                            default:
                                // Handle unknown data type
                                break;
                        }
                    });
                }
            });
        });
    </script> --}}
