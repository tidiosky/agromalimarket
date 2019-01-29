{{--<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('username', 'Username', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::text('username', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}--}}
    {{--{!! $errors->first('username', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('email', 'Email', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}--}}
    {{--{!! $errors->first('email', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--<div class="form-group {{ $errors->has('sexe') ? 'has-error' : ''}}">--}}
    {{--<label for="title" class="control-label">{{ 'Genre' }}</label>--}}
    {{--<select name="sexe" id="sexe" class="custom-select">--}}
        {{--<option value="" disabled>Veuillez selectionnez votre sexe</option>--}}
        {{--<option {{ Request::old('sexe') == "Homme" ? 'selected' :'' }} value="Homme">Homme</option>--}}
        {{--<option {{ Request::old('sexe') == "Femme" ? 'selected' :'' }} value="Femme">Femme</option>--}}
        {{--<option {{ Request::old('sexe') == "Démoiselle" ? 'selected' :'' }} value="Démoiselle">Démoiselle</option>--}}
    {{--</select>--}}
    {{--<input class="form-control" name="category_id" type="text" id="category_id" value="{{ $article->category_id or ''}}" >--}}
    {{--{!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}
{{--<div class="mdc-select {{ $errors->has('password') ? 'has-error' : ''}}">--}}
    {{--{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control','value' => Request::old('password')]) !!}--}}
    {{--{!! $errors->first('password', '<p class="help-block">:message</p>') !!}--}}
{{--</div>--}}

<div class="row">
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">person</i>
                            </span>
            <div class="form-line">
                <input type="text" class="form-control" value="{{ $user->name or Request::old('name')   }}" name="name" placeholder="Votre nom d'utilisateur"
                       required autofocus>
            </div>
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">email</i>
                            </span>
            <div class="form-line">
                <input type="email" class="form-control"  value="{{ $user->email or Request::old('email')   }}" name="email" placeholder="Votre adresse mail"
                       required>
            </div>
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

{{--FirstName and lastName--}}
<div class="row">
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">face</i>
                            </span>
            <div class="form-line">
                <input type="text" class="form-control" value="{{ $user->first_name or Request::old('first_name')   }}" name="first_name" placeholder="Votre nom prénom"
                       required >
            </div>
            {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">face</i>
                            </span>
            <div class="form-line">
                <input type="text" class="form-control" value="{{ $user->last_name or Request::old('last_name')   }}" name="last_name" placeholder="Votre nom"
                       required>
            </div>
            {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
{{--end firstname and lastname--}}
{{--Sexe and Section--}}
<div class="row">
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('sexe') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">accessibility</i>
                            </span>
            <select class="form-control show-tick" data-live-search="true" name="sexe" id="sexe" required="">
                <option value="" selected>___Votre sexe___</option>
                @if(isset($user))
                    <option  {{ $user->sexe == "Homme" ? 'selected' : ''   }} ? {{ Request::old('sexe') == "Homme" ? : '' }} value="Homme">Homme
                    </option>
                    <option  {{ $user->sexe == "Femme" ? 'selected' : ''   }} ? {{ Request::old('sexe') == "Femme" ? : '' }} value="Femme">Femme
                    </option>
                    <option {{ $user->sexe == "Démoiselle" ? 'selected' : ''   }} ? {{ Request::old('sexe') == "Démoiselle" ? : '' }} value="Démoiselle">
                        Démoiselle
                    </option>
                    @else
                    <option   {{ Request::old('sexe') == "Homme" ? : '' }} value="Homme">Homme
                    </option>
                    <option   {{ Request::old('sexe') == "Femme" ? : '' }} value="Femme">Femme
                    </option>
                    <option  {{ Request::old('sexe') == "Démoiselle" ? : '' }} value="Démoiselle">
                        Démoiselle
                    </option>
                @endif

            </select>
            {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('section') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">work</i>
                            </span>
            <select class="form-control show-tick" data-live-search="true" name="section" id="section" required="">
                <option value="" selected>___Votre section____</option>
                @if(isset($user))
                    <option {{ $user->section == "Acteur" ? 'selected' : ''   }} ? {{ Request::old('section') == "Acteur" ? : '' }}  value="Acteur">
                        Acteur
                    </option>
                    <option  {{ $user->section == "Producteur" ? 'selected' : ''   }} ? {{ Request::old('section') == "Producteur" ? : '' }}  value="Producteur">
                        Producteur
                    </option>
                    <option  {{ $user->section == "Tranformateur" ? 'selected' : ''   }} ? {{ Request::old('section') == "Transformateur" ? : '' }}  value="Transformateur">
                        Transformateur
                    </option>
                    <option {{ $user->section == "Autre" ? 'selected' : ''   }} ? {{ Request::old('section') == "Autre" ? : '' }} value="Autre">
                        Autre
                    </option>
                    @else
                    <option  {{ Request::old('section') == "Acteur" ? : '' }}  value="Acteur">
                        Acteur
                    </option>
                    <option   {{ Request::old('section') == "Producteur" ? : '' }}  value="Producteur">
                        Producteur
                    </option>
                    <option   {{ Request::old('section') == "Transformateur" ? : '' }}  value="Transformateur">
                        Transformateur
                    </option>
                    <option  value="Autre">
                        Autre
                    </option>
                @endif

            </select>
            {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
{{--end Sexe Section--}}
<div class="row">
    <div class="col-md-4">
        <div class="input-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">location_on</i>
                                        </span>
            <div class="form-line">
                <input type="text" data-live-search="true" class="form-control" name="country" id="country"
                       placeholder="Votre pays" value="{{ $user->country or Request::old('country')  }}" required >
            </div>
            {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group {{ $errors->has('lat') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">my_location</i>
                                        </span>
            <div class="form-line">
                <input type="text" class="form-control" name="lat" id="lat"
                       placeholder="Votre position" value="{{ $user->lat or Request::old('lat')  }}"  >
            </div>
            {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="input-group {{ $errors->has('lng') ? ' has-error' : '' }}">
                                        <span class="input-group-addon">
                                        <i class="material-icons">my_location</i>
                                        </span>
            <div class="form-line">
                <input type="text" class="form-control" value="{{ $user->lng or Request::old('lng')  }}" name="lng" id="lng"
                       placeholder="Votre position" >
            </div>
            {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="input-group  {{ $errors->has('about') ? 'has-error' : ''}}">
                            <span class="input-group-addon">
                                <i class="material-icons">description</i>
                            </span>
            <div class="form-line">
                <textarea rows="4" name="about" class="form-control no-resize" placeholder="Description de vous que vous voulez mettre...">{{ $user->about or Request::old('about')  }}</textarea>
            </div>
            {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                            </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password"  placeholder="Votre mot de passe"
                       >
            </div>
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-group {{ $errors->has('roles') ? 'has-error' : ''}}">
                            <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                            </span>
            {!! Form::select('roles[]',\Spatie\Permission\Models\Role::get()->pluck('name','name') , isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'show-tick form-control', 'required' => 'required','multiple'] : ['class' => 'show-tick form-control','multiple']) !!}

            {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
        </div>

    </div>
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
