<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        @if ($type == 1) Purchase Details Part No
                        @endif
                    </h4>
                    <a href="{{ route('create.part_no',['cat_id' => $type]) }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i><span class="btn-icon-add"></span>Create</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Supplier Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $purchase)
                                    <tr style="{{ $purchase->purchaseDetails->first()->rcv_qty == $purchase->purchaseDetails->first()->qty ? 'background-color: #4e7979 !important; color: black' : '' }}" @if ($purchase->purchaseDetails->isNotEmpty() && $purchase->purchaseDetails->first()->rcv_qty == $purchase->purchaseDetails->first()->qty) class="disabled-row" @endif>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('details', ['type' => $type, 'cat_id' => $purchase->id]) }}" class="text-info" style="text-decoration: none;">
                                                {{ $purchase->inv_no }}
                                            </a>
                                        </td>
                                        <td>{{ date("j F, Y", strtotime($purchase->inv_date)) }}</td>
                                        <td>{{ $purchase->supName->sup_name }}</td>

                                        {{-- Iterate through purchaseDetails for each Purchase --}}
                                        <td style="display: none;">
                                            @foreach ($purchase->purchaseDetails as $purchaseDetail)
                                                {{ $purchaseDetail->rcv_qty }}
                                            @endforeach
                                        </td>
                                        <td style="display: none;">
                                            @foreach ($purchase->purchaseDetails as $purchaseDetail)
                                                {{ $purchaseDetail->qty }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <style>
                            .disabled-row {
                                background-color: #4e7979; /* Set black background color for disabled rows */
                                color: #050505; /* Set white text color for disabled rows */
                                pointer-events: none; /* Disable pointer events for the row */
                            }
                        </style>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>


