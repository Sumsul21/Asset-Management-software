<x-app-layout>
<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- card header -->
            <div class="card-header">
                <h4 class="card-title">Show Leave</h4>
                <a href="{{ route('asset_group.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
            </div>

            <!-- card body -->
            <div class="card-body">
                <div class="form-validation">
                    <!-- this is for validation checking message -->
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif

                    <!-- this is from -->
                    <form class="form-valide" action="{{route('asset_group.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group col">
                                    <label class="row-lg col-form-label">Group Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="row-lg">
                                        <input type="text" id="leave_name" class="form-control @error('leave_name') is-invalid @enderror" name="group_name" value="{{$data->group_name}}" disabled>
                                        @error('leave_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group col">
                                    <label class="row-lg col-form-label">Group Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="row-lg">
                                        <input type="text" id="leave_code" class="form-control text-uppercase @error('leave_code') is-invalid @enderror" name="group_code" value="{{$data->group_code}}" disabled>

                                        @error('leave_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- this is for yearly limit -->

                            </div>
                            <div class="col-xl-6">

                                <!-- this is for description -->
                                <div class="form-group col">
                                    <label class="row-lg col-form-label">Description</label>
                                    <div class="row-lg">
                                        <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="" value="{{$data->description}}" disabled>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                 <!-- this is for status -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label" for="status">Status</label>
                                        <div class="row-lg">
                                            <input type="text" id="status" class="form-control @error('status')is-invalid @enderror" name="status" placeholder="" value="{{ $data->status == 1? 'Active' : 'Inactive' }}" disabled>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
