<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Repair Approve</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Repair Date</th>
                                    <th>Ast Name</th>
                                    <th>Asset Code</th>
                                    <th>Rep Amount</th>
                                    <th>Repair Details</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{date("j F, Y", strtotime($row->repair_date))}}</td>
                                    <td>{{$row->AssetTransaction->assetDetails->asset_name}}</td>
                                    <td>{{$row->AssetTransaction->asset_code}}</td>
                                    <td>{{$row->repair_amount}}</td>
                                    <td>{{$row->repair_details}}</td>
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('ast_repair.approve', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-success p-1 mr-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('ast_repair.canceled', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-danger p-1">Canceled</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
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


