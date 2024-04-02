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
                        <form class="form-valide" action="" method="post" enctype="multipart/form-data">
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
                                                        <input type="hidden" name="asset_transactions_id" id="asset_transactions_id" value="{{$data->assetTransaction->id}}">

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
                                                            <input type="text" class="form-control" value="{{$data->empName->emp_name}}" disabled>
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
                                                            <input type="date" name="mov_date" id="mov_date" class="form-control"  value="{{$data->mov_date}}" disabled>
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
                                                            <input type="text" class="form-control" value="{{$data->departMents->dept_name}}" disabled>
                                                            @error('departments_id')
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
                                                        <label for="" class="col-md-4 col-form-label">Location
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" value="{{ $data->locaTion->location_name }}" disabled>
                                                            @error('locations_id')
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
                                                        <label for="" class="col-md-4 col-form-label">Remarks
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <textarea class="text form-control" id="remarks" name="remarks" rows="2" disabled>{{$data->remarks}}</textarea>
                                                             @error('remarks')
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
                                            {{-- <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Department Name:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="dept_name">{{ $data->departMents->dept_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <label class="col-6 col-form-label"><strong>Locations Name:</strong></label>
                                                    <label class="tranInfo col-6 col-form-label" data-type="location_name">{{ $data->locaTion->location_name }}</label>
                                                </div>
                                            </div> --}}
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
