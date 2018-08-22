@extends('installer::layouts.installer')

@section('title')
    {{ __('installer::main.title') }}
@endsection

@section('panel')

    <form class="" action="{{ route('installer::install') }}" method="post">
        {{ csrf_field() }}

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{ __('installer::main.install.title') }}</h3>
            </div>

            <div class="panel-body" id="regular-body">
                <div class="alert alert-success">
                    {{ __('installer::main.configuration.success') }}
                </div>
                <hr>

                <p>{{ __('installer::main.install.text') }}</p>
            </div>

            <div class="panel-body" id="busy-body" style="display:none">
                <div class="alert alert-warning">
                    <i class="fa fa-refresh fa-spin" style="font-size:24px;margin-right:12px;"></i> 
                    {{ 'La configuración de la base de datos puede llevar un tiempo. Por favor, espere.' }}
                </div>
                <hr>

                <p></p>
            </div>

            <div class="panel-footer text-right">
                <a class="btn btn-link" href="{{ route('installer::configuration') }}">{{ __('pagination.previous') }}</a>
                <button class="btn btn-primary" type="submit" onclick="this.disabled=true;toggle_to_processing();this.form.submit();">
                    {{ __('installer::mainl.install.action') }}
                </button>
            </div>
        </div>

    </form>

@endsection



@push('scripts')

<script type="text/javascript">

function toggle_to_processing()
{

    // 
    $('#regular-body').hide('slow');

    // 
    $('#busy-body').show('slow');

}

</script>

@endpush
