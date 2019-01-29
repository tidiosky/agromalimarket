

<div class="input-group input-group-lg {{ $errors->has('name') ? 'has-error' : ''}}">
    <span class="input-group-addon">
        <i class="material-icons">font_download</i>
    </span>
    <div class="form-line">
        <input type="text" name="name" class="form-control" placeholder="Nom de votre catégorie" value="{{ $category->name or ''}}">
    </div>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary btn-raised" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
