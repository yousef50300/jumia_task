@extends('dashboard.layouts.master')

@section('title')
    {{ trans('trips.plural') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ trans('trips.plural') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-3">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                        <a href="{{ route('dashboard.trips.create') }}" class="btn btn-success ml-1"
                           data-toggle="tooltip" title="" data-original-title="Create New">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </div><!--btn-toolbar-->
                </div>

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

