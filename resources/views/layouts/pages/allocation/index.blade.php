<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Allocation Details<span class="bg-blue-500 text-white rounded px-1 text-xs py-0.5"></span></h4>
                    {{-- @can('Role create') --}}
                    <a href="{{ route('allocation.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create</a>
                    {{-- @endcan --}}
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
                                    <th class="text-right pr-1">Action</th>
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
                                            <a href="{{ route('allocation.edit', $data->id) }}" class="btn btn-success btn-sm p-2">Edit</a>
                                            <a href="{{ route('allocation.show', $data->id) }}" class="btn btn-info btn-sm p-2">View</a>
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
