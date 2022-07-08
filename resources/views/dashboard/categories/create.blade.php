@extends('dashboard.layouts.master')

@section('title')
    @lang('categories.actions.list') | @lang('categories.actions.create')
@endsection

@section('content')
    {{ BsForm::resource('categories')->post(route('dashboard.categories.store'),['files' => true]) }}

    <div class="card my-4">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('categories.actions.list')
                        <small class="text-muted">@lang('categories.actions.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
        </div>
        <div class="card-body p-1">
            @include('dashboard.categories.partials.form')
        </div>
        <div class="card-footer">
            {{ BsForm::submit(trans('categories.actions.save')) }}
        </div>
    </div>

    {{ BsForm::close() }}

@endsection

@push('after-scripts')
    <script>
        $('#image').change(function () {
            var image = document.getElementById('image-preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        });
    </script>
@endpush
