<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">Depriciation Edit</h4>
                    <a href="{{ route('dep_name.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="form-validation">
                        <!-- this is for validation checking message -->
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <!-- this is from -->
                        <form class="form-valide" action="{{route('dep_name.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Dep name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="row-lg">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" pattern="[a-zA-Z]+.*" title="Leave name must start with alphabets then others" autofocus required>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Interval
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="row-lg">
                                            <select class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" placeholder="" value="{{ old('duration') }}">
                                                <option>Select Duration</option>
                                                @for ($i = 3; $i <= 12; $i += 3)
                                                    <option value="{{ $i }}" {{ old('duration', $data->duration) == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>

                                            @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Percentage</label>
                                        <div class="row-lg">
                                            <input type="text" id="percentage" class="form-control @error('percentage') is-invalid @enderror" name="percentage" placeholder="" value="{{$data->percentage}}">
                                            @error('percentage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Life Time</label>
                                        <div class="row-lg">
                                            <input type="text" id="life_time" class="form-control @error('life_time') is-invalid @enderror" name="life_time" placeholder="" value="{{$data->life_time}}">
                                            @error('life_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <!-- this is for description -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label">Auto Cal</label>
                                        <div class="row-lg">
                                             <select class="form-control @error('auto_cal') is-invalid @enderror" id="auto_cal" name="auto_cal"  placeholder=""  value="{{old('auto_cal')}}">
                                                <option value="1" {{ $data->auto_cal == 1? 'selected': '' }}>Yes</option>
                                                <option value="0" {{ $data->auto_cal == 0? 'selected': '' }}>No</option>
                                            </select>
                                             @error('auto_cal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                     <!-- this is for status -->
                                    <div class="form-group col">
                                        <label class="row-lg col-form-label" for="status">Status</label>
                                        <div class="row-lg">
                                            <select class="form-control" id="status" name="status" value="">
                                                <option value="1" {{ $data->status == 1? 'selected': '' }}>Active</option>
                                                <option value="0" {{ $data->status == 0? 'selected': '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- submit button -->
                                <div class="col-lg">
                                    <button type="submit" class="btn btn-success btn-sm float-right mr-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(function () {
        $(".dropdwon_select").select2();
    });
</script>
