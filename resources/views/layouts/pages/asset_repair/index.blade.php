<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Asset Repair<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="{{ route('ast_repair.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create</a>
                    {{-- @endcan --}}
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{Session::has('message') ? Session::get('message') : ''}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Asset Name</th>
                                    <th>Asset Code</th>
                                    <th>Serial No</th>
                                    <th>Rep Amount</th>
                                    <th>Rep Date</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($repair as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->assetTransaction->assetDetails->asset_name }}</td>
                                    <td>{{ $data->assetTransaction->asset_code }}</td>
                                    <td>{{ $data->assetTransaction->serial_no }}</td>
                                    <td>{{ $data->repair_amount }}</td>
                                    <td>{{ $data->repair_date }}</td>
                                    <td class="float-right" style="width:100px">
                                        @if($data->status == 0)
                                            <a href="{{ route('ast_repair.edit', $data->id) }}" class="btn btn-success btn-sm btn-xm p-2">Edit</a>
                                        @endif
                                        <a href="{{ route('ast_repair.show', $data->id) }}" class="btn btn-info btn-sm btn-xm p-2">View</a>
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
