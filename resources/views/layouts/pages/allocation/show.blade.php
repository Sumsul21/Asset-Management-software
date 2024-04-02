<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Show Allocation Information</h4>
                    <a href="{{ route('allocation.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <div class="card-body">
                    <div class="form-validation">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif

                        <form class="form-valide mr-3" action="{{ route('allocation.index', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('GET')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Asset Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="asset_code" class="form-control" name="asset_transections_id" value="{{ $data->astCode->asset_code ?? 'N/A'}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Sang Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="date" name="sang_date" id="" class="form-control" value="{{$data->sang_date ?? 'N/A'}}" disabled/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Allocation To</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="" class="form-control" name="employees_id" value="{{ $data->empLoyee->emp_name ?? 'N/A'}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Allocation Department</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="" class="form-control" name="dept_id" value="{{ $data->dept_id ?? 'N/A'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Allocation Location</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="" class="form-control" name="loc_id" value="{{ $data->loc_id ?? 'N/A'}}" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label for="" class="crow-lg col-form-label">Remarks</label>
                                        <div class="row-lg">
                                            <textarea class="text form-control" id="" name="remarks" rows="2" disabled>{{ $data->remarks ?? 'N/A' }}</textarea>
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



