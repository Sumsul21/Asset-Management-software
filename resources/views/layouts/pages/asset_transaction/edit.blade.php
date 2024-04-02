<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Edit Transection</h4>
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
                        <form class="form-valide mr-3" action="{{route('ast_trans.update',$data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Asset Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="details_code" class="form-control text-capitalize @error('asset_code') is-invalid @enderror" name="asset_code" value="{{$data->assetDetails->asset_name}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Asset code
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="details_code" class="form-control text-capitalize @error('asset_code') is-invalid @enderror" name="asset_code" value="{{$data->asset_code}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Org Value
                                                <span class="text-danger">*</span>
                                            </label>

                                            <div class="col-md-6">
                                                <input type="text" id="details_code" class="form-control text-capitalize @error('asset_code') is-invalid @enderror" name="asset_code" value="{{$data->org_value}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Part Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="part_no" class="form-control text-capitalize @error('detail_code') is-invalid @enderror" name="part_no" value="{{$data->part_no}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-4 col-form-label">Rf ID Number
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="part_no" class="form-control text-capitalize @error('detail_code') is-invalid @enderror" name="rfid_num" value="{{ $data->rfid_num }}" autofocus required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

