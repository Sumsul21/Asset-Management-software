<x-app-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Edit Movement</h4>
                    <a href="{{ route('movement.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
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
                        <form class="form-valide" action="{{route('movement.update',$data->id)}}" method="post" enctype="multipart/form-data">
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
                                                        <input type="hidden" name="asset_transections_id" id="getTransaction" value="{{$data->assetTransaction->id}}">

                                                        <input type="text" class="form-control" value="{{$data->assetTransaction->asset_code}}" disabled>
                                                        @error('asset_transactions_id')
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
                                                        <label for="" class="col-md-4 col-form-label">Employee Name
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control dropdwon_select" name="departments_id" >
                                                                @foreach ($employee as $row)
                                                                    <option value="{{$row->id}}" {{$row->id == $data->emp_id ? 'selected' : '' }}>{{ $row->emp_name}}</option>
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
                                                        <label for="" class="col-md-4 col-form-label">Move Date
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="date" name="mov_date" id="mov_date" class="form-control"  value="{{$data->mov_date}}">
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
                                                        <label for="" class="col-md-4 col-form-label">Department
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control dropdwon_select" name="departments_id" >
                                                                @foreach ($department as $row)
                                                                    <option value="{{$row->id}}" {{$row->id == $data->departments_id ? 'selected' : '' }}>{{ $row->dept_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-md-4 col-form-label">Location
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select class="form-control dropdwon_select" name="locations_id" >
                                                                @foreach ($location as $row)
                                                                    <option value="{{$row->id}}" {{$row->id == $data->locations_id ? 'selected' : '' }}>{{ $row->location_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="" class="col-md-4 col-form-label">Remarks
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <textarea class="text form-control" id="repair_details" name="remarks" rows="2">{{$data->remarks}}</textarea>
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
