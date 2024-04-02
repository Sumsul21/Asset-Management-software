<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Create Supplier Information</h4>
                    <a href="{{ route('employee.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif

                        <!-- this is from -->
                        <form class="form-valide" action="{{ route('employee.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Employee Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="emp_name"
                                                class="form-control @error('emp_name') is-invalid @enderror"
                                                name="emp_name" value="{{ old('emp_name') }}" pattern="[a-zA-Z]+.*"
                                                title="Employee name must start with alphabets then others" autofocus
                                                required>
                                            @error('emp_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Employee Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="emp_code"
                                                class="form-control @error('emp_code') is-invalid @enderror"
                                                name="emp_code" value="{{ old('emp_code') }}" autofocus required>
                                            @error('emp_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Employee Designation</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="emp_desig"
                                                class="form-control @error('emp_desig') is-invalid @enderror"
                                                name="emp_desig" placeholder="" value="{{ old('emp_desig') }}">
                                            @error('emp_desig')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Contact Number</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="number" id="cont_number"
                                                class="form-control @error('cont_number') is-invalid @enderror"
                                                name="cont_number" placeholder="" value="{{ old('cont_number') }}">
                                            @error('cont_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Email</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Date of Birth
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="" value="{{old('date_of_birth')}}" />
                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Gender</label>
                                        <div class="row-lg">
                                            <select name="emp_gender" class="form-control default-select  @error('emp_gender') is-invalid @enderror" style="height: 40px;">
                                                <option selected disabled value="">Please Select Gender</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                            @error('emp_gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">NID
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" name="nid_no" id="nid_no" class="form-control @error('nid_no') is-invalid @enderror" placeholder="" value="{{old('nid_no')}}"/>
                                            @error('nid_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Blood Group
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <select name="blood_group" id="blood_group" class="form-control default-select @error('blood_group') is-invalid @enderror" style="height: 40px;">
                                                <option value="" selected>Select</option>
                                                <option value="1">O Positive (0+)</option>
                                                <option value="2">O Negative (0-)</option>
                                                <option value="3">A Positive (A+)</option>
                                                <option value="4">A Negative (A-)</option>
                                                <option value="5">B Positive (B+)</option>
                                                <option value="6">B Negative (B-)</option>
                                                <option value="7">AB Positive (AB+)</option>
                                                <option value="8">AB Negative (AB-)</option>
                                            </select>
                                            @error('blood_group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Department Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <select class="form-control dropdwon_select" id="dept_id" name="dept_id" required>
                                                <option selected disabled value="">Please Select Department Name</option>
                                                @foreach ($dept as $row)
                                                    <option value="{{$row->id}}">{{$row->dept_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Location Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <select class="form-control dropdwon_select" id="loc_id" name="loc_id" required>
                                                <option selected disabled value="">Please Select Location Name</option>
                                                @foreach ($loca as $data)
                                                    <option value="{{$data->id}}">{{$data->location_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                <!-- submit button -->
                                <div class="col-xl-12">
                                    <div class="col-lg">
                                        <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
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
