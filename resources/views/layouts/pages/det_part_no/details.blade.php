<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                         @if ($type == 1) Purchase Details Part No
                        @endif
                    </h4>
                </div>

                    <div class="card-body pt-2">
                        <div class="row details">
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <label class="col-6 col-form-label"><strong> Invoice No :</strong></label>
                                    <select name="invoice_number" class="form-control" disabled>
                                        @foreach ($data as $row)
                                            <option value="{{ $row->id }}">{{ $row->inv_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <label class="col-6 col-form-label"><strong>Invoice Date :</strong></label>
                                    <select name="invoice_date" class="form-control" disabled>
                                        @foreach ($data as $row)
                                            <option value="{{ $row->id }}">{{ $row->inv_date }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <label class="col-6 col-form-label"><strong>Supplier Name:</strong></label>
                                    <h6 class="col-6" style="margin-top: 8px">{{ $purchase->sup_name }}</h6>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>SL#</th>
                                        <th>Category</th>
                                        <th>Group Name</th>
                                        <th>Part No.</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Rcv Qty</th>
                                        <th>SL No</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$row->group_name}}</td>
                                            <td>{{$row->type_name ?? 'N/A' }}</td>
                                            <td>{{$row->part_no}}</td>
                                            <td>{{$row->price}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->rcv_qty ?? '0' }}</td>
                                            <td class="text-right">
                                                @if ($row->qty == $row->rcv_qty)
                                                <span class="badge light badge-success">
                                                    <i class="fa fa-circle text-success mr-1"></i>Successful
                                                </span>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-primary p-1 px-2" id="add_data" data-detId="5" data-id="{{ $row->id }}"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Add</button>

                                                @endif
                                            </td>
                                            <td>{{ $subtotal = $row->price * $row->qty }}</td>

                                        </tr>
                                        @php
                                            $total += $subtotal;
                                        @endphp
                                    @endforeach

                                    <!-- <tr>
                                        <td colspan="6" align="right"><h6>Total</h6></td>
                                            <td>{{ $total }}</td>
                                    </tr> -->
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>



    <!-- The modal -->
    <div class="modal fade" id="modalGrid">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Serial Number</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" data-action="{{ route('det_part_no.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <div class="modal-body py-2">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Registerd Date
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="date" name="reg_date" id="inv_date" class="form-control" value="{{ old('date') ? old('date'):  date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">Part No
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-7">
                                    <input type="text" id="getPartNo" name="part_no" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="main-row-data">
                            <input type="hidden" id="qty">
                            <input type="hidden" id="getRcvQty">
                            <input type="hidden" id="purchaseId" name="purchase_id">
                            <input type="hidden" id="assetDetailsId" name="asset_details_id">
                            <input type="hidden" id="purDetailsId" name="purchase_details_id">
                            <input type="hidden" id="rcvQty" name="rcv_qty">
                        </div>

                        <div class="row" style="height: 180px; overflow-y: auto">
                            <div class="col-md-12">
                                <!--=====//Table//=====-->
                                <div class="table-responsive">
                                    <table id="items-table" class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="10%">SL#</th>
                                                <th width="45%">SL No.</th>
                                                <th width="23%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary submit_btn">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div><span id="serial_no_error" class="text-danger"></span>
</x-app-layout>

<script type="text/javascript">
    /*=======//GRN Purchase Add Modal//=========*/
    $(document).on('click','#add_data', function(){
        var id = $(this).data('id');

        $.ajax({
            url:'{{ route('get_purchase_details')}}',
            method:'GET',
            dataType:"JSON",
            data:{'id': id},
            success:function(response){

                //---SetUp
                $('#purDetailsId').val(response.id);
                $('#purchaseId').val(response.purchase_id);
                $('#assetDetailsId').val(response.asset_details_id);
                $('#qty').val(response.qty);
                $('#getRcvQty').val(response.rcv_qty);
                $('#rcvQty').val(response.rcv_qty + 1);
                // alert(response.asset_name);
                $('#getPartNo').val(response.part_no);

            },
            error: function(response) {
                swal("Error!", "All input values are not null or empty.", "error");
            }
        });

        $("#modalGrid").modal('show');
        var tbody = $('#table-body');
        tbody.empty();
        addRow(0);
    });
    /*=======//GRN Purchase Save Data//=========*/
    var form = '#add-user-form';
    $(form).on('submit', function(event){
        event.preventDefault();
        var url = $(this).attr('data-action');

        //--Validation then save
        var allValuesNotNull = true;
        $('.val_serial_no').each(function() {
            var value = $(this).val();
            if (value === null || value === '') {
                allValuesNotNull = false;
                return false;
            }
        });
        if (allValuesNotNull) {
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(response)
                {
                    $("#modalGrid").modal('hide');
                    swal("Your data save successfully", "Well done, you pressed a button", "success")
                    .then(function() {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    if (xhr.status === 422 && xhr.responseJSON.hasOwnProperty('error')) {

                        swal({
                            title: "Error occurred!",
                            text: xhr.responseJSON.error,
                            icon: "warning",
                            button: "OK",
                            dangerMode: true,
                        });
                    } else {
                        swal("Error!", "Unknown error occurred.", "error");
                    }
                }
            });
        } else {
            swal("Error!", "The serial number field is required.", "error");
        }
    });
</script>


<script type="text/javascript">
    //======Add ROW
    var count = 0;
    $('#items-table').on('click', '.add-row', function() {
        var allValuesNotNull = true;
        $('.val_serial_no').each(function() {
            var value = $(this).val();
            if (value === null || value === '') {
                allValuesNotNull = false;
                return false;
            }
        });
        if (allValuesNotNull) {
            var qty = parseInt($('#qty').val());
            var rcvQty = parseInt($('#getRcvQty').val());
            var checkQty = qty - rcvQty;
            var rowCount = parseInt($('#items-table tbody tr').length) + 1;
            if(checkQty >= rowCount){
                ++count;
                addRow(count);
                var qtyResult = rcvQty + rowCount;
                $('#rcvQty').val(qtyResult);
            }else{
                Swal.fire(
                    'Done',
                    'Your already fill up all data!',
                    'question'
                )
            }
        } else {
            swal("Error!", "All input values are not null or empty.", "error");
        }
    });

    function addRow(i) {
        var rowCount = parseInt($('#items-table tbody tr').length) + 1;
        var newRow = $('<tr>' +
            '<td><label class="form-label">' + rowCount + '</label></td>' +
            '<td><input type="text" name="moreFile[' + i + '][serial_no]" id="serial_no" class="form-control val_serial_no" placeholder="Write Here"></td>' +
            '<td class="text-center">' +
            '<button type="button" title="Add New" class="btn btn-icon btn-outline-warning border-0 btn-xs add-row"><span class="fa fa-plus"></span></button>' +
            '<button type="button" title="Remove" class="btn btn-icon btn-outline-danger btn-xs border-0 remove-row"><span class="fa fa-trash"></span></button>' +
            '</td>' +
            '</tr>');

        $('#items-table tbody').append(newRow);
        //--Dropdown Search Fix
        newRow.find('.dropdwon_select').each(function () {
            $(this).select2({
                dropdownParent: $(this).parent()
            });
        });

        //--Serial number already exists
        newRow.find('.val_serial_no').on('change', function () {
            var serialNumber = $(this).val();
            var currentRow = $(this).closest('tr');
            var serialInput = $(this);

            $.ajax({
                url: '{{ route('checkSerialNumber') }}',
                method: 'GET',
                dataType: "JSON",
                data: {serial_no: serialNumber},
                success: function (response) {
                    if (response.exists) {
                        alert('Serial number already exists.');
                        serialInput.val('');
                    } else {
                        currentRow.find('.serial_no_error').text('');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        });
    }

    //======Remove ROW
    $('#items-table').on('click', '.remove-row', function () {
        $(this).closest('tr').remove();
        var rec_qty = $('#rcvQty').val();
        $('#rcvQty').val(rec_qty - 1);
    });

</script>



