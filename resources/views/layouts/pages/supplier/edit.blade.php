<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Edit Supplier Information</h4>
                    <a href="{{ route('supply_name.index') }}" class="btn btn-sm btn-primary"><i
                            class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif

                        <!-- this is from -->
                        <form class="form-valide" action="{{ route('supply_name.update', $data->id)}}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Supplier Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="supplier_name"
                                                class="form-control @error('sup_name') is-invalid @enderror"
                                                name="sup_name" value="{{($data->sup_name) }}" pattern="[a-zA-Z]+.*"
                                                title="Leave name must start with alphabets then others" autofocus
                                                required>
                                            @error('sup_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Contact Person Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="contact_perName"
                                                class="form-control @error('contact_perName') is-invalid @enderror"
                                                name="contact_perName" value="{{( $data->contact_perName) }}" pattern="[a-zA-Z]+.*"
                                                title="Leave name must start with alphabets then others" autofocus
                                                required>
                                            @error('contact_perName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Supplier Address</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="supplier_address"
                                                class="form-control @error('supplier_address') is-invalid @enderror"
                                                name="supplier_address" placeholder="" value="{{ ($data->supplier_address) }}">
                                            @error('supplier_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Contact Phone Number</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="number" id="contact_phNumber"
                                                class="form-control @error('contact_phNumber') is-invalid @enderror"
                                                name="contact_phNumber" placeholder="" value="{{  ($data->contact_phNumber) }}">
                                            @error('contact_phNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Supplier Phone Number</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="number" id="supplier_phNumber"
                                                class="form-control @error('supplier_phNumber') is-invalid @enderror"
                                                name="supplier_phNumber" placeholder="" value="{{( $data->supplier_phNumber) }}">
                                            @error('supplier_phNumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Supplier Web Address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="web_address"
                                                class="form-control @error('web_address') is-invalid @enderror"
                                                name="web_address" value="{{ ($data->web_address) }}">
                                            @error('web_address')
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
                                                name="email" placeholder="" value="{{ ( $data->email ) }}">
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
                                        <label class="row-lg col-form-label">Supplier Designation</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="text" id="designation"
                                                class="form-control @error('designation') is-invalid @enderror"
                                                name="designation" placeholder="" value="{{ ( $data->designation ) }}">
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Fax</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="number" id="fax"
                                                class="form-control @error('fax') is-invalid @enderror"
                                                name="fax" placeholder="" value="{{  ($data->fax) }}">
                                            @error('fax')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Credit Limit</label>
                                        <span class="text-danger">*</span>
                                        <div class="row-lg">
                                            <input type="number" id="credit_limit"
                                                class="form-control @error('credit_limit') is-invalid @enderror"
                                                name="credit_limit" placeholder="" value="{{ ($data->credit_limit) }}">
                                            @error('credit_limit')
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
                                    <button type="submit"
                                        class="btn btn-success btn-sm float-left mr-3">Submit</button>
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
