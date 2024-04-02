<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Create Location</h4>
                    <a href="{{ route('dept_loc.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif

                        <!-- this is from -->
                        <form class="form-valide" action="{{ route('dept_loc.index', $data->id)  }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Location Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="location_name" class="form-control @error('location_name') is-invalid @enderror" name="location_name" value="{{$data->location_name}}" disabled>
                                                @error('location_name')
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
                                            <label for="" class="col-md-4 col-form-label">Contact Person Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="contact_perName" class="form-control @error('contact_perName') is-invalid @enderror" name="contact_perName" value="{{$data->contact_perName}}" disabled>
                                                @error('contact_perName')
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
                                            <label for="" class="col-md-4 col-form-label">Contact Phone Number
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="number" id="contact_phNumber" class="form-control @error('contact_phNumber') is-invalid @enderror" name="contact_phNumber" value="{{$data->contact_phNumber}}" disabled>
                                                @error('contact_phNumber')
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
                                            <label for="" class="col-md-4 col-form-label">Address
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$data->address}}" disabled>
                                                @error('address')
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
                                            <label for="" class="col-md-4 col-form-label">Description
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$data->description}}" disabled>
                                                @error('description')
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
                                            <label for="" class="col-md-4 col-form-label">Status
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <select class="form-control" id="status" name="status" value="" disabled>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
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



