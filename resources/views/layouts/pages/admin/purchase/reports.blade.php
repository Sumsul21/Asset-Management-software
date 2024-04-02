<x-app-layout>
    <form class="form-valide" action="#" method="post" enctype="multipart/form-data" name="form">
    @csrf                           
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Purchase Reports<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 mt-2"><h5>Select Report</h5>
                                <!-- <span class="text-danger">*</span> --></label>
                            <div class="col-md-4">
                                <select name="" class="form-control default-select  @error('select_report') is-invalid @enderror" style="height: 40px;">
                                <option><h6>..Select One..</h6></option>
                                <option value="1">Purchase Details</option>
                                <option value="2">Purchase Summary</option>
                                <option value="3">Product Wise Sales</option>
                                <option value="4">Product Wise Sales Summary</option>
                                <option value="5">Purchase Return</option>
                                <option value="6">Product Wise Received</option>
                                <option value="7">Return Summary</option>
                                <option value="8">Warrenty Summary</option>
                                <option value="9">Stock Position</option>
                                <option value="10">Stock Value</option>
                                </select>
                                @error('select_report')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 mt-2"><h5>Begin Date</h5>
                                <!-- <span class="text-danger">*</span> --></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="start_date" placeholder="Enter Date.." id="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 mt-2"><h5>End Date</h5>
                                <!-- <span class="text-danger">*</span> --></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="end_date" placeholder="Enter Date.." id="dateTwo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 mt-2"><h5>Purchase Store</h5>
                                <!-- <span class="text-danger">*</span> --></label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="purchase_store" placeholder="0000" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 mt-2"><h5>Description</h5>
                                <!-- <span class="text-danger">*</span> --></label>
                        <div class="col-md-4">
                            <textarea type="text" class="form-control" name="description">Write Something Here..
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                        <button type="button" class="btn btn-outline-primary float-right" id="view_data">View Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</x-app-layout>


<script>
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
</script>



