<div class="input-group input-group-lg {{ $errors->has('name') ? 'has-error' : ''}}">
<span class="input-group-addon">
        <i class="material-icons">font_download</i>
    </span>
    <div class="form-line">
        <input type="text" name="name" class="form-control" required placeholder="Nom de votre rôle" value="{{ $role->name or ''}}">
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-group input-group-lg  {{ $errors->has('permissions') ? 'has-error' : ''}}">
    <span class="input-group-addon">
        <i class="material-icons">keyboard_arrow_down</i>
    </span>
    {!! Form::select('permissions[]',$permissions, old('permissions') ??isset($role)?$role->permissions->pluck('name','name'):null, ('' == 'required') ? ['class' => 'form-control show-tick', 'required' => 'required','multiple'] : ['class' => 'form-control show-tick','multiple']) !!}
    {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
