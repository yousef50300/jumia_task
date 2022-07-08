@extends('dashboard.layouts.master')

@section('title')
    {{ trans('routes.actions.create') }}
@endsection

@section('content')
    <form action="{{ route('dashboard.routes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('routes.actions.create')
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">

                    <div class="col">
                        <div class="form-group row">
                            <label for="bus_number"
                                   class="col-md-2 form-control-lg">{{ __('routes.attributes.name') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="name" required class="form-control" value="{{ old('name') }}">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="start_destination"
                                   class="col-md-2 form-control-lg">{{ __('routes.attributes.start_destination') }}</label>
                            <div class="col-md-10">
                                <select class="form-control" id="start_destination" name="start_destination" required>
                                    @foreach($cities as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="end_destination"
                                   class="col-md-2 form-control-lg">{{ __('routes.attributes.end_destination') }}</label>
                            <div class="col-md-10">
                                <select class="form-control" id="end_destination" name="end_destination" required>
                                    @foreach($cities as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="stops"
                                   class="col-md-2 form-control-lg">Stops</label>
                            <div class="col-md-9">
                                <select class="form-control" id="stops">
                                    @foreach($cities as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--col-->

                            <div class="col-md-1">
                                <button type="button" class="btn btn-success add_bundle_item">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-2">

                                <table class="table" id="bundle-items-result-table">
                                    <thead>
                                    <tr>
                                        <th>Station</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer bg-white clearfix">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('dashboard.routes.index') }}"
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
        $("#stops").select2();

        let currentIndex = 0;

        $(document).delegate('.add_bundle_item', 'click', function (e) {
            e.preventDefault();
            let bundleItem = $("#stops option:selected");

            if (bundleItem.val()) {
                var tableTbody = $('#bundle-items-result-table tbody');
                var exist;

                tableTbody.find('tr').each(function () {
                    var title2 = $(this).attr('aria-controls');

                    if (title2 == bundleItem.val()) {
                        exist = true;
                        return false;
                    }
                });

                if (!exist) {
                    tableTbody.append(
                        `<tr aria-controls="${bundleItem.val()}">
                            <td>${bundleItem.text()}</td>
                            <td>
                                <button type="button" class="btn btn-danger remove">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </td>
                            <input type="hidden" name="stops[]" value="${bundleItem.val()}">
                        </tr>`
                    );

                    currentIndex = currentIndex + 1;
                }
            }


        });
    </script>
@endpush
