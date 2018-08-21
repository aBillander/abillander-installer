@extends('installer::layouts.installer')

@section('title')
    {{ __('installer::main.title') }}
@endsection

@section('panel')

    {{ Form::open(array('url' => route('installer::company'), 'id' => 'create_company', 'name' => 'create_company', 'class' => 'form')) }}
        <div class="panel panel-default" id="panel_generales">
            <div class="panel-heading">
                <h3 class="panel-title">{{ __('installer::main.company.title') }}</h3>
            </div>

            <div class="panel-body">

                @include('installer::partials.company.form')

                @include('installer::partials.company.user')

            </div>

            <div class="panel-footer text-right">
                <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
                    <i class="fa fa-floppy-o"></i>
                    &nbsp; {{ __('installer::main.company.action') }}
                </button>
            </div>
        </div>
    {{ Form::close() }}

    @include('installer::partials.errors')

@endsection
