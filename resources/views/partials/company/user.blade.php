<hr>
<h4>Datos de acceso del administrador</h4>
<div class="row">
    <div class="form-group col-md-4">
        Name
        <input type="text" name="user[firstname]" class="form-control">
    </div>
    <div class="form-group col-md-4">
        Surname
        <input type="text" name="user[lastname]" class="form-control">
    </div>
    <input type="hidden" name="user[name]" value="admin">
    <input type="hidden" name="user[home_page]" value="/">
</div>
<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('user.email') ? 'has-error' : '' }}">
        Email
        <input type="text" name="user[email]" value="{{ old('user.email') }}" class="form-control" required>
        {!! $errors->first('user.email', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-md-4 {{ $errors->has('user.password') ? 'has-error' : '' }}">
        Password
        <input type="password" name="user[password]" class="form-control" required>
        {!! $errors->first('user.password', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-md-4">
        Repeat Password
        <input type="password" name="user[password_confirmation]" class="form-control" required>
    </div>
</div>
