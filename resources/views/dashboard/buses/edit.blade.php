@extends('dashboard.layouts.master')

@section('title')
    {{ trans('buses.actions.edit') }}
@endsection

@section('content')
    <form action="{{ route('dashboard.buses.update', $bus) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('buses.actions.edit')
                        </h4>
                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-2 form-control-lg">{{ __('buses.attributes.bus_number') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="bus_number" value="{{ old('bus_number',$bus->bus_number) }}"
                                       placeholder="{{ __('buses.attributes.bus_number') }}"
                                       required
                                       class="form-control">
                            </div><!--col-->
                        </div>


                        <div class="card-footer bg-white clearfix">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('dashboard.buses.index') }}"
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
