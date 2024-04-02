<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Asset Transection<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="{{ route('ast_trans.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create</a>
                    {{-- @endcan --}}
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{Session::has('message') ? Session::get('message') : ''}}</p>
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Rfid Num</th>
                                    <th>Ast Code</th>
                                    <th>Book Val</th>
                                    <th>Org Val</th>
                                    <th>Serial Num</th>
                                    <th>Part Num</th>
                                    <th class="text-right pr-4">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($transaction as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->rfid_num }}</td>
                                        <td>{{ $data->asset_code }}</td>
                                        <td>{{ $data->book_value }}</td>
                                        <td>{{ $data->org_value }}</td>
                                        <td>{{ $data->serial_no }}</td>
                                        <td>{{ $data->part_no }}</td>
                                        <td class="float-right" style="width:100px">
                                            <a href="{{ route('ast_trans.edit', $data->id) }}" class="btn btn-success btn-sm p-2">Rf ID</a>
                                            <a href="{{ route('ast_trans.show', $data->id) }}" class="btn btn-info btn-sm p-2">View</a>
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
