<ul class="list-group">
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::welcome' ? 'active' : '' }}">
        <i class="fa fa-globe"></i>
        &nbsp; {{ __('installer::main.overview.welcome') }}
    </li>
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::license' ? 'active' : '' }}">
        <i class="fa fa-file"></i>
        &nbsp; {{ __('installer::main.overview.license') }}
    </li>
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::config' ? 'active' : '' }}">
        <i class="fa fa-database"></i>
        &nbsp; {{ __('installer::main.overview.config') }}
    </li>
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::install' ? 'active' : '' }}">
        <i class="fa fa-wrench"></i>
        &nbsp; {{ __('installer::main.overview.install') }}
    </li>
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::company' ? 'active' : '' }}">
        <i class="fa fa-building"></i>
        &nbsp; {{ __('installer::main.overview.company') }}
    </li>
    <li id="b_generales" class="list-group-item {{ Route::currentRouteName() == 'installer::done' ? 'active' : '' }}">
        <i class="fa fa-star"></i>
        &nbsp; {{ __('installer::main.overview.done') }}
    </li>
</ul>
