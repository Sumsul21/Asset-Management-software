<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Asset Withdrawal<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>

                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{Session::has('message') ? Session::get('message') : ''}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Ast Code</th>
                                    <th>All To</th>
                                    <th>Sang Date</th>
                                    <th>All Dept</th>
                                    <th>All Loca</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($allo as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->astCode->asset_code }}</td>
                                <td>{{ $data->empLoyee->emp_name }}</td>
                                <td>{{ $data->sang_date }}</td>
                                <td>{{ $data->dept_id }}</td>
                                <td>{{ $data->loc_id }}</td>
                                <td class="float-right" style="width:100px">
                                    <button type="button" class="btn btn-success btn-sm btn-xm p-2" id="edit_details" data-detId="5"  data-id="{{ $data->id }}"> Edit</button>
                                    <a href="#" class="btn btn-info btn-sm btn-xm p-2">View</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=======//Modal Show Data//========-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Withdrawal Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" data-action="{{route('ast_withdrawal.store')}}" method="post" enctype="multipart/form-data" id="add-user-form">
                    @csrf
                    <div class="modal-body py-2">
                        <div class="row" id="main-row-data">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Sangsation Date</label>
                                    <div class="col-md-7">
                                        <input type="date" name="sang_date" id="sang_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Asset Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="asset_transections_id" id="asset_code" class="form-control" value="">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">End Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Allocation To
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="employees_id" id="emp_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Withdrawal Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="date" name="withdrawal_data" id="withdrawal_data" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Allocation Department
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="departments_id" id="dept_id" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Remarks</label>
                                    <div class="col-md-7">
                                        <textarea name="remarks" id="remarks"  class="form-control" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Allocation Location
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="master_locations_id" id="loc_id" class="form-control">
                                    </div>
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
    </div>
</x-app-layout>
<script type="text/javascript">

    /*=======//Show Modal//=========*/
    $(document).on('click','#edit_details',function(){
        var id = $(this).data('id');

        $.ajax({
            url: '{{ route('get_allocation_details') }}',
            method: 'GET',
            dataType: "JSON",
            data: {'id': id},
            success: function (response) {
                console.log(response);
                $('#sang_date').val(response.sang_date);
                $('#asset_code').val(response.asset_code);
                $('#end_date').val(response.end_date);
                $('#emp_name').val(response.emp_name);
                $('#loc_id').val(response.loc_id);
                $('#dept_id').val(response.dept_id);
                $('#remarks').val(response.remarks);
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('Error occurred while fetching data.');
            }
        });

        $(".modal-title").html('Withdrawal');
        $(".bd-example-modal-lg").modal('show');
        $(".table_action").show();
        $(".submit_btn").show();
    });

</script>

