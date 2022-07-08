@extends('dashboard.layouts.master')

@section('title')
    {{ trans('users.actions.edit') }}
@endsection

@section('content')
    <form action="{{ route('dashboard.users.update', $user) }}" method="post"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('users.actions.edit')
                        </h4>
                    </div><!--col-->
                </div><!--row-->
                <hr>
                <div class="row mt-4 mb-4">
                    <div class="col">

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-2 form-control-lg">{{ __('users.attributes.name') }}</label>
                            <div class="col-md-10">
                                <input type="text" name="name" value="{{ old('name',$user->name) }}"
                                       placeholder="{{ __('users.attributes.name') }}"
                                       required
                                       class="form-control">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-2 form-control-lg">{{ __('users.attributes.email') }}</label>
                            <div class="col-md-10">
                                <input type="email" name="email" value="{{ old('email',$user->email) }}"
                                       placeholder="{{ __('users.attributes.email') }}"
                                       required
                                       class="form-control">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-2 form-control-lg">{{ __('users.attributes.password') }}</label>
                            <div class="col-md-10">
                                <input type="password" name="password"
                                       placeholder="{{ __('users.attributes.password') }}"
                                       class="form-control">
                            </div><!--col-->
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation"
                                   class="col-md-2 form-control-lg">{{ __('users.attributes.password_confirmation') }}</label>
                            <div class="col-md-10">
                                <input type="password" name="password_confirmation"
                                       placeholder="{{ __('users.attributes.password_confirmation') }}"
                                       class="form-control">
                            </div><!--col-->
                        </div>

                        <div class="card-footer bg-white clearfix">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('dashboard.users.index') }}"
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
