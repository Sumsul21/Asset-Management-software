<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">
                        @if ($type == 1) Purchase Details Part No
                        @endif
                    </h4>
                    <a href="{{ route('det_part_no',['cat_id' => $type]) }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif

                        <!-- this is from -->
                        <form class="form-valide" action="{{route('det_part_no.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <!-- this is for leave code -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Part No
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <input type="number" id="part_no" class="form-control @error('part_no') is-invalid @enderror" name="part_no" value="{{old('part_no')}}">                                 
                                            @error('part_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- this is for yearly limit -->
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for leave code -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Serial No
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <input type="number" id="leave_code" class="form-control @error('leave_code') is-invalid @enderror" name="serial_no" value="{{old('serial_no')}}">                                 
                                            @error('serial_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- this is for yearly limit -->
                                </div>
                                

                                <div class="col-xl-6">
                                     <!-- this is for status -->
                                     <div class="form-group col">
                                        <label class="row-lg col-form-label" for="status">Status</label>
                                        <div class="row-lg">
                                            <select class="form-control" id="status" name="status" value="">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                </div>  
                            </div>

                            </div>
                            
                            <div class="col-lg">
                                <button type="submit" class="btn btn-success btn-sm float-right mr-3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>