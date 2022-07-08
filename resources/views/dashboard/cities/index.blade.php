@extends('dashboard.layouts.master')

@section('title')
    {{ trans('cities.plural') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ trans('cities.plural') }}
                    </h4>
                </div><!--col-->

            </div><!--row-->


            <div class="row mt-4">
                <div class="col">
                    <div class="">
                        {!! $dataTable->table() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->

        </div><!--card-body-->
    </div><!--card-->
@endsection


@push('after-scripts')
    {!! $dataTable->scripts() !!}
@endpush

