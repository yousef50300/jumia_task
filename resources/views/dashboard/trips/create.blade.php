@extends('dashboard.layouts.master')

@section('title')
    {{ trans('trips.actions.create') }}
@endsection

@section('content')
    <form action="{{ route('dashboard.trips.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('trips.actions.create')
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">

                    <div class="col">
                        <div class="form-group row">
                            <label for="bus_number"
                                   class="col-md-2 form-control-lg">{{ __('trips.attributes.name') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="name" required class="form-control" value="{{ old('name') }}">
                            </div><!--col-->
                        </div>


                        <div class="form-group row">
                            <label for="route_id"
                                   class="col-md-2 form-control-lg">{{ __('trips.attributes.route') }}</label>
                            <div class="col-md-10">
                                <select class="form-control" name="route_id" id="route_id">
                                    @foreach($routes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="route_id"
                                   class="col-md-2 form-control-lg">{{ __('trips.attributes.bus_number') }}</label>
                            <div class="col-md-10">
                                <select class="form-control" name="bus_number" id="bus_number">
                                    @foreach($buses as $bus)
                                        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="card-footer bg-white clearfix">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('dashboard.trips.index') }}"
                                       class="btn btn-danger text-white">{{  __('core.cancel') }}</a>
                                </div><!--col-->

                                <div class="col text-left">
                                    <button type="submit"
                                            class="btn btn-success text-white">{{  __('core.save') }}</button>

                                </div><!--col-->
                            </div><!--row-->
                        </div><!--card-footer-->

                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@push('after-scripts')
    <script src="{{ asset('js/select2.full.js') }}"></script>

    <script>
        $("#route_id").select2();
    </script>
@endpush
