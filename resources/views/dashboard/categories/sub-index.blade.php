@extends('core::dashboard.layouts.master')

@section('title')
    {{ trans('category::categories.plural') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ trans('category::categories.actions.subcategories'). request()['category']->name }}
                    </h4>
                </div><!--col-->

            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="">
                        <table class="table" id="result-table">
                            <thead>
                            <tr>
                                <th>@lang('category::categories.attributes.order')</th>
                                <th>@lang('category::categories.attributes.name')</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->

        </div><!--card-body-->
    </div><!--card-->
@endsection

@push('after-scripts')

    <script>
        @can('sort-category')
        $dataTable('{{ route('dashboard.categories.subcategories', request('category')) }}',
            [
                {
                    data: 'order', name: 'order', render: function (data, e, row) {
                        return '<div data-rowid="' + row['id'] + '"></div>' + row['order'];
                    }
                },
                {data: 'name', name: 'translations.name'},
                {data: 'action', name: 'action', searchable: false, orderable: false}

            ], true, "{{ route('dashboard.categories.sort') }}?parent_id=" + '{{ request()["category"]->id }}&'
        );
        @else
        $dataTable('{{ route('dashboard.categories.subcategories', request('category')) }}',
            [
                {data: 'order', name: 'order'},
                {data: 'name', name: 'translations.name'},
                {data: 'action', name: 'action', searchable: false, orderable: false}

            ]);
        @endcan
    </script>

@endpush
