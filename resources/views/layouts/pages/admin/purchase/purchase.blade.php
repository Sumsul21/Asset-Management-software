<x-app-layout>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form class="form-valide" action="{{ route('purchase.store')}}" method="post" enctype="multipart/form-data" name="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Order No.
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <label class="col-md-5 col-form-label">GULF-123545</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Supplier Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <select name="sup_id" class="form-control @error('sup_id') is-invalid @enderror">
                                            <option value="1">Motiur Rahman</option>
                                            <option value="2">Riyad Khan</option>
                                            <option value="3">Sabbir</option>
                                            <option value="4">Major</option>
                                        </select>
                                        @error('sup_id')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Order Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="date" class="form-control @error('inv_date') is-invalid @enderror" name="inv_date" placeholder="Enter Order Date.." value="{{ old('date') ? old('date'):  date('Y-m-d') }}" id="date">
                                        @error('inv_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label">Store Name</label>
                                    <div class="col-md-7">
                                        <select name="store_id" class="form-control default-select @error('store_id') is-invalid @enderror">
                                        <option selected disabled>----Make----</option>
                                            @foreach ($store as $row)
                                                <option value="{{$row->id}}">{{$row->store_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('store_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <label for="" class="col-md-2">Remarks</label>
                                    <div class="col-md-10">
                                        <textarea name="remarks" cols="30" rows="2" class="form-control  @error('remarks') is-invalid @enderror" style="width: 96.5%; margin-left: 45px;"></textarea>
                                        @error('remarks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!--=====//Table//=====-->
                                <table id="items-table" class="table table-bordered">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th width="15%">Part Name</th>
                                            <th width="15%">Part No</th>
                                            <th width="10%">Pkg. Qty.</th>
                                            <th width="10%">Unit</th>
                                            <th width="10%">Qty</th>
                                            <th width="15%">Price</th>
                                            <th width="15%">Subtotal</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select type="text" id="item_category" class="form-control" required>
                                                <option selected disabled>--Select--</option>
                                                @foreach($partName as $data)
                                                    <option value="{{ $data->id}}">{{ $data->part_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><select id="partNumber" name="moreFile[0][item_id]" class="form-control" required></select></td>
                                            <td><input type="text" name="" readonly id="packageSize" class="form-control"></td>
                                            <td><input type="text" name="" readonly id="unit" class="form-control"></td>
                                            <td><input type="number" name="moreFile[0][qty]" id="" class="form-control quantity" placeholder='0.00' required></td>
                                            <td><input type="number" name="moreFile[0][price]" id="" class="form-control price" placeholder='0.00' required></td>
                                            <td class="subtotal">0.00</td>
                                            <td class="text-center">
                                                <button type="button" title="Add New" class="btn btn-icon btn-outline-warning border-0 btn-xs" id="add-row" onclick="insertData()"><span class="fa fa-plus"></span></button>
                                                <button type="button" title="Remove" class="btn btn-icon btn-outline-danger btn-xs border-0 remove-row"><span class="fa fa-trash"></span></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="float-right">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <label><h6>Total</h6></label>
                                        </div>
                                        <div class="col-md-8">
                                            <h5 id="total"></h5>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="modal-footer" style="height:20px">
                            <button type="button" class="btn btn-sm btn-danger light mt-4" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary mt-4" id="output">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                    @if($type == 1)
                            AC purchase
                            @elseif($type == 2)
                            AC spare parts purchase
                            @else
                            Car spare parts purchase
                        @endif
                    <span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i><span class="btn-icon-add" data-bs-toggle="modal"></span>Create</a>
                    {{-- @endcan --}}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order Date</th>
                                <th>Order No</th>
                                <th>Supplier Name</th>
                                <th>Store Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($master as $row)
                                   <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->inv_date}}</td>
                                        <td>GULF-123545</td>
                                        <td>{{$row->sup_id}}</td>
                                        <td>{{$row->store_id}}</td>
                                        <td class="d-flex justify-content-end">
                                            @if($row->status == 0)
                                            <a class="btn btn-warning btn-xs">Processing</a>
                                            @elseif($row->status == 1)
                                            <a class="btn btn-success btn-xs">Done</a>
                                            @elseif($row->status == 2)
                                            <a class="btn btn-danger btn-xs">Cancel</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i style="font-size:15px" class="fa fa-indent" aria-hidden="true"></i><span  data-bs-toggle="modal"></span></a>
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><i style="font-size:15px" class="fa fa-pencil-square" aria-hidden="true"></i>
                                            <span  data-bs-toggle="modal"></span></a>
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


</x-app-layout>

<script>
    $(document).ready(function() {
        var i = 0;
        $('#add-row').click(function() {
            ++i;
            $('#items-table tbody').append('<tr><td><select type="text" id="item_category" class="form-control"><option selected disabled>--Select--</option> @foreach($partName as $data) <option value="{{ $data->id}}">{{ $data->part_name}}</option> @endforeach </select></td><td><select type="text" id="partNumber" name="moreFile['+i+'][item_id]" class="form-control"></select></td><td><input type="text" readonly id="packageSize" class="form-control"></td><td><input type="text" readonly id="unit" class="form-control"></td><td><input type="number" name="moreFile['+i+'][qty]" class="form-control quantity" placeholder="0.00"></td><td><input type="number" name="moreFile['+i+'][price]" class="form-control price" placeholder="0.00"></td><td class="subtotal">0.00</td><td class="text-center"><button type="button" title="Add" class="btn btn-icon btn-outline-warning border-0 btn-xs" id="add-row"><span class="fa fa-plus"></span></button><button type="button" title="Remove" class="btn btn-icon btn-outline-danger btn-xs border-0 remove-row"><span class="fa fa-trash"></span></button></div></td></tr>');
        });
        $('#items-table').on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
            updateSubtotal();
        });

        $('#items-table').on('input', '.quantity, .price', function() {
            updateSubtotal();
        });

        function updateSubtotal() {
            var total = 0;
            $('#items-table tbody tr').each(function() {
            var quantity = parseFloat($(this).find('.quantity').val()) || 0;
            var price = parseFloat($(this).find('.price').val()) || 0;
            var subtotal = quantity * price;
           

            $(this).find('.subtotal').text(subtotal.toFixed(2));
            total += subtotal;
            });

            $('#total').text(total.toFixed(2));
         
        }
    });

</script>

<script>
    //======Get Item Group All Data
    $(document).on('change','#item_category',function(){
        var partId = $(this).val();
        var currentRow = $(this).closest("tr");
        
        $.ajax({
            url:'{{ route('get-part-id')}}',
            method:'GET',
            dataType:"html",
            data:{'part_id':partId},
            success:function(data){
                console.log(data)
                currentRow.find('#partNumber').html(data);
            },
           
        });
    });
    //======Show Single Row Data
    $(document).on('change','#partNumber', function(){
        var partNumber_id = $(this).val();
        var currentRows = $(this).closest("tr"); 
        
        $.ajax({
            url:'{{ route('get-part-number')}}',
            method:'GET',
            dataType:"JSON",
            data:{'item_id':partNumber_id},
            success:function(data){
                console.log(data)
                currentRows.find('#packageSize').val(data.box_qty);
                currentRows.find('#unit').val(data.unit.unit_name);
                currentRows.find('.quantity').focus();
            }
        });
    });
    //=======Total Count
    // $('#price, #quantity').keyup(function(){
    //     var price = parseFloat($('#price').val());
    //     var qty = parseFloat($('#quantity').val());
    //     $('#total').val(price * qty+'.00');
    // });

    // $('.price, .quantity').keyup(function(){
    //     let total = 0;
    //     $('#audit-design-matrix-table').each(function() {
    //         alert('hi2')
    //         const quantity = parseFloat($(this).find('.quantity').val()) || 0;
    //         const price = parseFloat($(this).find('.price').val()) || 0;
    //         const lineTotal = quantity * price;

    //         $('#total').val(quantity * price+'.00');
    //     });
    // });


</script>




<!-- <script>
  const openModalIcon = document.getElementById('openModalIcon');
  const modal = document.getElementById('modal');
  const modalTitle = document.getElementById('modalTitle');
  const modalContent = document.getElementById('modalContent');

  openModalIcon.addEventListener('click', () => {
    // Fetch data
    const data = fetchData();

    // Populate modal with data
    modalTitle.innerText = data.title;
    modalContent.innerText = data.content;

    // Show the modal
    modal.style.display = 'block';
  });

  function fetchData() {
    // Simulated data retrieval
    
  } `
</script> -->


<script>
  // Function to insert data
  function insertData() {
    var part_name = document.getElementById("part_name").value;
    var part_id = document.getElementById("part_id").value;
    var qty = document.getElementById("qty").value;
    var price = document.getElementById("price").value;
    
    // Your code to process the data goes here
  }

  // Call the insertData function
  insertData();

  // Display an error message using SweetAlert
  swal("Error!", "An error occurred. val_price", "error");
</script>