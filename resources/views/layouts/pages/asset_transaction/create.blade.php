<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Create Transection</h4>
                    <a href="{{ route('ast_trans.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif

                        <!-- this is from -->
                        <form class="form-valide" action="{{route('ast_trans.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Rfid Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" id="rfid_num" class="form-control @error('rfid_num') is-invalid @enderror" name="rfid_num" value="{{old('rfid_num')}}" autofocus required>
                                            @error('rfid_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Asset Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <select class="form-control dropdwon_select" id="asset_code" name="asset_code" required>
                                                <option selected disabled value="">Please Select Asset Code Name</option>
                                                @foreach ($asset_details as $row)
                                                    <option data-id="{{ $row->id }}">{{$row->asset_code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Book Value
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <input type="text" id="book_value" class="form-control @error('book_value') is-invalid @enderror" name="book_value" value="{{old('book_value')}}">
                                            @error('book_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Org Value
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <input type="text" id="org_value" class="form-control @error('org_value') is-invalid @enderror" name="org_value" value="{{old('org_value')}}">
                                            @error('org_value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Serial Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" id="serial_no" class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" value="{{old('serial_no')}}" autofocus required>
                                            @error('serial_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Part Number
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="number" id="part_no" class="form-control @error('part_no') is-invalid @enderror" name="part_no" value="{{old('part_no')}}" autofocus required>
                                            @error('part_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Start Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="Enter Date.." value="{{old('start_date')}}" id="date">
                                            @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">End Date
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{old('end_date')}}" id="dateTwo">
                                            @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- submit button -->
                                <div class="col-lg">
                                    <button type="submit" class="btn btn-success btn-sm float-right mr-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function () {
        // Event handler for the change event of the dropdown
        $('#asset_code').on('change', function () {
            // Get the selected option's value
            var selectedOption = $(this).val();

            // Check if the selected option is the default disabled option
            if (selectedOption === "") {
                // Get the unique identifier from your data (replace 'id' with the actual field)
                var uniqueId = getUniqueIdFromRowData();

                // Generate a new unique code based on the unique identifier
                var newCode = generateUniqueCode(uniqueId);
                $(this).val(newCode);

                // Optionally, update the displayed text in the dropdown
                $(this).find(':selected').text(newCode);
            }
        });

        // Your code generation logic (replace this with your actual logic)
        function generateUniqueCode(uniqueId) {
            // Example: Combine a constant prefix with the unique identifier
            return 'UNIQUE' + uniqueId;
        }

        // Your function to get a unique identifier from your data (replace 'id' with the actual field)
        function getUniqueIdFromRowData() {
            // Example: Get the 'id' field from your row data
            // You may need to customize this based on your data structure
            return $('#asset_code').data('id');
        }
    });
</script>


{{-- <script>
    var d = new Date()
    var yr =d.getFullYear();
    var month = d.getMonth()+1

    if(month<10){
        month='0'+month
    }

    var date =d.getDate();
    if(date<10)
    {
        date='0'+date
    }

    var c_date = yr+"-"+month+"-"+date;

    document.getElementById('dateTwo').value = c_date;
</script>


<script>
    var d = new Date();
    var yr = d.getFullYear();
    var month = d.getMonth() + 1;

    if (month < 10) {
        month = '0' + month;
    }

    var date = '01'; // Always set the date to 01 for the first day of the month

    var c_date = yr + '-' + month + '-' + date;
    document.getElementById('date').value = c_date;
</script> --}}
