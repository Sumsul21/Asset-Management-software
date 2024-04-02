<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Edit Supplier Information</h4>
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
                        <form class="form-valide" action="{{ route('employee.update', $data->id)}}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
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
                                                name="emp_name" value="{{ $data->emp_name }}" pattern="[a-zA-Z]+.*"
                                                title="Employee name must start with alphabets then others" disabled>
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
                                                name="emp_code" value="{{ $data->emp_code }}" disabled>
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
                                                name="emp_desig" placeholder="" value="{{ $data->emp_desig }}" disabled>
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
                                                name="cont_number" placeholder="" value="{{ $data->cont_number }}" disabled>
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
                                                name="email" placeholder="" value="{{ $data->email }}" disabled>
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
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="" value="{{ $data->date_of_birth }}" disabled/>
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
                                            <input type="text" id="emp_gender" class="form-control" name="emp_gender" placeholder="" value="{{ $data->emp_gender == 0? 'Male' : 'Female'}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">NID
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" name="nid_no" id="nid_no" class="form-control @error('nid_no') is-invalid @enderror" placeholder="" value="{{ $data->nid_no }}" disabled/>
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
                                        <label for="blood_group" class="row-lg col-form-label">Blood Group
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="blood_group" class="form-control" name="blood_group" placeholder="" value="{{ $data->blood_group == 1 ? 'O Positive (0+)' : ($data->blood_group == 2 ? 'O Negative (0-)' : ($data->blood_group == 3 ? 'A Positive (A+)' : ($data->blood_group == 4 ? 'A Negative (A-)' : ($data->blood_group == 5 ? 'B Positive (B+)' : ($data->blood_group == 6 ? 'B Negative (B-)' : ($data->blood_group == 7 ? 'AB Positive (AB+)' : 'AB Negative (AB-)')))))) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Department Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="dept_id" class="form-control" name="dept_id" placeholder="" value="{{ $data->deptName->dept_name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Location Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="loc_id" class="form-control" name="loc_id" placeholder="" value="{{ $data->locName->location_name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for status -->
                                    <div class="form-group col">
                                       <label class="row-lg col-form-label" for="status">Status</label>
                                       <div class="row-lg">
                                        <input type="text" id="status" class="form-control" name="status" placeholder="" value="{{ $data->status == 1? 'Active' : 'Inactive'}}" disabled>
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
