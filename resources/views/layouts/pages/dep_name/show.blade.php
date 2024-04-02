<x-app-layout>
<div class="row">
    <div class="col-12">
        <div class="card">

            <!-- card header -->
            <div class="card-header">
                <h4 class="card-title">Show Depreciation</h4>
                <a href="{{ route('dep_name.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
            </div>

            <!-- card body -->
            <div class="card-body">
                <div class="form-validation">

                    <!-- this is for validation checking message -->
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif

                    <!-- this is from -->
                    <form class="form-valide" action="{{route('dep_name.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Dep name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" disabled>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Interval
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <input type="text" id="duration" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{$data->duration}}" disabled>
                                            @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Percentage</label>
                                        <div class="row-lg">
                                            <input type="text" id="percentage" class="form-control @error('percentage') is-invalid @enderror" name="percentage" placeholder="" value="{{$data->percentage}}" disabled>
                                            @error('percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Life Time</label>
                                        <div class="row-lg">
                                            <input type="text" id="life_time" class="form-control @error('life_time') is-invalid @enderror" name="life_time" placeholder="" value="{{$data->life_time}}" disabled>
                                            @error('life_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Auto Cal</label>
                                        <div class="row-lg">
                                            <input type="text" class="form-control @error('auto_cal') is-invalid @enderror" name="auto_cal" placeholder="" value="{{$data->auto_cal == 1 ? 'Yes' : 'No'}}" disabled>
                                            @error('auto_cal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label" for="status">Status</label>
                                        <div class="row-lg">
                                            <input type="text" id="status" class="form-control @error('status')is-invalid @enderror" name="status" placeholder="" value="{{ $data->status == 1? 'Active' : 'Inactive' }}" disabled>
                                            @error('dept_head')
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
