<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Employee Edit</h4>
                    <a href="{{ route('employee.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <!-- this is from -->
                        <form class="form-valide mr-3" action="{{route('employee.update', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                title="Employee name must start with alphabets then others" required>
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
                                                name="emp_code" value="{{ $data->emp_code }}" required>
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
                                                name="emp_desig" placeholder="" value="{{ $data->emp_desig }}" required>
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
                                                name="cont_number" placeholder="" value="{{ $data->cont_number }}" required>
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
                                                name="email" placeholder="" value="{{ $data->email }}" required>
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
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="" value="{{ $data->date_of_birth }}"/>
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
                                            <select class="form-control" id="emp_gender" name="emp_gender" value="">
                                                <option value="0" {{ $data->status == 1? 'selected': '' }}>Male</option>
                                                <option value="1" {{ $data->status == 0? 'selected': '' }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">NID
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" name="nid_no" id="nid_no" class="form-control @error('nid_no') is-invalid @enderror" placeholder="" value="{{ $data->nid_no }}" required/>
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
                                            <select name="blood_group" id="blood_group" class="form-control default-select @error('blood_group') is-invalid @enderror" style="height: 40px;">
                                                <option value="" selected>Select</option>
                                                <option value="1" {{$data->blood_group ==1 ? 'selected' : '' }} >O Positive (0+)</option>
                                                <option value="2" {{$data->blood_group ==2 ? 'selected' : '' }} >O Negative (0-)</option>
                                                <option value="3" {{$data->blood_group ==3 ? 'selected' : '' }} >A Positive (A+)</option>
                                                <option value="4" {{$data->blood_group ==4 ? 'selected' : '' }} >A Negative (A-)</option>
                                                <option value="5" {{$data->blood_group ==5 ? 'selected' : '' }} >B Positive (B+)</option>
                                                <option value="6" {{$data->blood_group ==6 ? 'selected' : '' }} >B Negative (B-)</option>
                                                <option value="7" {{$data->blood_group ==7 ? 'selected' : '' }} >AB Positive (AB+)</option>
                                                <option value="8" {{$data->blood_group ==8 ? 'selected' : '' }} >AB Negative (AB-)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Department Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <select class="form-control dropdwon_select" name="dept_id" >
                                                @foreach ($dept_name as $row)
                                                    <option value="{{$row->id}}" {{$row->id == $data->dept_id ? 'selected' : '' }}>{{ $row->dept_name}}</option>
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
                                            <select class="form-control dropdwon_select" name="loc_id" >
                                                @foreach ($loca_name as $row)
                                                    <option value="{{$row->id}}" {{$row->id == $data->loc_id ? 'selected' : '' }}>{{ $row->location_name}}</option>
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
                                                <option value="1" {{ $data->status == 1? 'selected': '' }}>Active</option>
                                                <option value="0" {{ $data->status == 0? 'selected': '' }}>Inactive</option>
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
