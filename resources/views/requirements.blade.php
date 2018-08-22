@extends('installer::layouts.installer')

@section('title')
    {{ __('installer::main.title') }}
@endsection

@push('styles')
    <style media="screen">
        .list-group-item.item-header, .list-group-item.item-header:hover, .list-group-item.item-header:focus {
            color: inherit;
            background-color: #ddd;
            border-color: rgba(0, 0, 0, 0.12);
        }
        .list-group-item.item-success, .list-group-item.item-success:hover, .list-group-item.item-success:focus {
            color: inherit;
            background-color: #dff0d8;
            border-color: rgba(0, 0, 0, 0.12);
        }
        .list-group-item.item-error, .list-group-item.item-error:hover, .list-group-item.item-error:focus {
            color: inherit;
            background-color: #eed3d7;
            border-color: rgba(0, 0, 0, 0.12);
        }
        a[disabled] {
            pointer-events: none;
        }
    </style>
@endpush

@section('panel')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('installer::main.requirements.title') }}</h3>
        </div>

        <div class="panel-body">
            <p>{{ __('installer::main.requirements.text') }}</p>
            <hr>

            @if( !$phpSupportInfo['supported'] || isset($requirements['errors']) || isset($permissions['errors']) )
                <div class="alert alert-danger" style="margin-bottom: 20px;">
                    <p>El Instalador no puede continuar. Solucione los problemas de compatibilidad e inténtelo de nuevo.</p>
                </div>
            @endif

            <div class="col-md-6">
                <div class="list-group">
                    <div class="list-group-item item-header">
                        <strong>{{ __('installer::main.requirements.server') }}</strong>
                    </div>
                    <div class="list-group-item item-{{ $phpSupportInfo['supported'] ? 'success' : 'error' }}">
                        <i class="fa fa-fw fa-{{ $phpSupportInfo['supported'] ? 'check' : 'times' }} row-icon" aria-hidden="true"></i>
                        <strong>PHP 7.2.5 {{ __('installer::main.requirements.min_version', ['version' => $phpSupportInfo['minimum']]) }}</strong>
                    </div>
                    @foreach ($requirements['requirements']['php'] as $extension => $enabled)
                        <div class="list-group-item item-{{ $enabled ? 'success' : 'error' }}">
                            <i class="fa fa-fw fa-{{ $enabled ? 'check' : 'times' }} row-icon" aria-hidden="true"></i>
                            {{ $extension }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <div class="list-group-item item-header">
                        <strong>{{ __('installer::main.requirements.permissions') }}</strong>
                    </div>
                    @foreach ($permissions['permissions'] as $permission)
                        <div class="list-group-item item-{{ $permission['isSet'] ? 'success' : 'error' }}">
                            <strong>
                                <i class="fa fa-fw fa-{{ $permission['isSet'] ? 'check' : 'times' }} row-icon" aria-hidden="true"></i>
                                {{ $permission['permission'] }}
                            </strong>
                            - {{ $permission['folder'] }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <a class="btn btn-link" href="{{ route('installer::license') }}">{{ __('pagination.previous') }}</a>
            <a class="btn btn-primary" href="{{ route('installer::configuration') }}" {{ $phpSupportInfo['supported'] && !isset($requirements['errors']) && !isset($permissions['errors']) ? '' : 'disabled' }}>
                {{ __('pagination.next') }}
            </a>
        </div>
    </div>

@endsection
