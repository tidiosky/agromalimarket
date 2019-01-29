<div class="col-md-8 col-12 mr-auto ml-auto">

    <!--      Wizard container        -->
    <div class="wizard-container">
        <div class="card card-wizard active" data-color="rose" id="wizardProfile">
            <form action="{{ route('profile.edit',auth()->user()->name) }}" enctype="multipart/form-data" method="post"
                  novalidate="novalidate">
            {{ csrf_field() }}
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                    <h3 class="card-title">
                       Modification de profile
                    </h3>
                    <h5 class="card-description">Ces informations serviront a vous identifier partout sur la platforme.</h5>
                </div>
                <div class="wizard-navigation">
                    <ul class="nav nav-pills">
                        <li class="nav-item" style="width: 33.3333%;">
                            <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                A propos
                            </a>
                        </li>
                        <li class="nav-item" style="width: 33.3333%;">
                            <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                Compte
                            </a>
                        </li>
                        <li class="nav-item" style="width: 33.3333%;">
                            <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                Adresse
                            </a>
                        </li>
                    </ul>
                    <div class="moving-tab"
                         style="width: 222.444px; transform: translate3d(-8px, 0px, 0px); transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1) 0s;">
                        About
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="about">
                            <h5 class="info-text"> Let's start with the basic information (with validation)</h5>
                            <div class="row justify-content-center">
                                <div class="col-sm-4">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="{{ asset('avatar/' . auth()->user()->avatar) }}" class="picture-src"
                                                 id="wizardPicturePreview" title="">
                                            <input id="wizard-picture" name="avatar" type="file">
                                        </div>
                                        <h6 class="description">Choose Picture</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-user" aria-hidden="true"></i>
</span>
                                        </div>
                                        <div class="form-group bmd-form-group has-danger">
                                            <label for="exampleInput1" class="bmd-label-floating">Prenom (required)</label>
                                            <input class="form-control" id="exampleInput1"
                                                   value="{{Request::old('first_name') ? : Auth::user()->first_name   }}"
                                                   name="first_name" required="" aria-required="true" aria-invalid="true"
                                                   type="text"><label id="exampleInput1-error" class="error"
                                                                      for="exampleInput1">This field is required.</label>
                                        </div>
                                    </div>
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-user" aria-hidden="true"></i>
</span>
                                        </div>
                                        <div class="form-group bmd-form-group has-danger">
                                            <label for="exampleInput11" class="bmd-label-floating">Votre nom</label>
                                            <input class="form-control" id="exampleInput11" name="last_name"
                                                   value="{{Request::old('last_name') ? : Auth::user()->last_name   }}"
                                                   required="" aria-required="true" aria-invalid="true" type="text"><label
                                                    id="exampleInput11-error" class="error" for="exampleInput11">This field
                                                is required.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-3">
                                    <div class="input-group form-control-lg">
                                        <div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-envelope" aria-hidden="true"></i>
</span>
                                        </div>
                                        <div class="form-group bmd-form-group has-danger">
                                            <label for="exampleInput1" class="bmd-label-floating">Email (required)</label>
                                            <input class="form-control" id="exampleemalil"
                                                   value="{{Request::old('email') ? : Auth::user()->email   }}" name="email"
                                                   required="" aria-required="true" aria-invalid="true" type="email"><label
                                                    id="exampleemalil-error" class="error" for="exampleemalil">This field is
                                                required.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="account">
                            <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-user" aria-hidden="true"></i>
</span>
                                                </div>
                                                <div class="form-group select-wizard">
                                                    <div class="dropdown bootstrap-select">
                                                        <select class="selectpicker" data-size="7"
                                                                data-style="select-with-transition" name="section"
                                                                title="Single Select" tabindex="-98">
                                                            <option {{ Request::old('section') == "Acteur" ? 'selected' :'' }} ?
                                                                    {{ auth()->user()->section == "Acteur" ? 'selected' :'' }} value="Acteur">
                                                                Acteur
                                                            </option>
                                                            <option {{ Request::old('section') == "Producteur" ? 'selected' :'' }} ?
                                                                    {{ auth()->user()->section == "Producteur" ? 'selected' :'' }} value="Producteur">
                                                                Producteur
                                                            </option>
                                                            <option {{ Request::old('section') == "Autre" ? 'selected' :'' }} ?
                                                                    {{ auth()->user()->section == "Autre" ? 'selected' :'' }} value="Autre">
                                                                Autre
                                                            </option>
                                                        </select>

                                                        <div class="dropdown-menu " role="combobox">
                                                            <div class="inner show" role="listbox" aria-expanded="false"
                                                                 tabindex="-1">
                                                                <ul class="dropdown-menu inner show"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-phone" aria-hidden="true"></i>
</span>
                                                </div>
                                                <div class="form-group bmd-form-group has-danger">
                                                    <label for="phone" class="bmd-label-floating">Prenom (required)</label>
                                                    <input class="form-control" id="phone" name="phone"
                                                           placeholder="Votre contact"
                                                           value="{{Request::old('phone') ? : Auth::user()->phone   }}"
                                                           required="" aria-required="true" aria-invalid="true" type="text"><label
                                                            id="exampleInput1-error" class="error" for="phone">Numero
                                                        téléphonique obligatoire.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group form-control-lg">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                                </div>
                                                <div class="form-group bmd-form-group has-danger">
                                                    <label for="exampleInput1" class="bmd-label-floating">Nom de votre
                                                        chaine </label>
                                                    <input class="form-control" id="exampleInput1" name="shop_name"
                                                           value="{{Request::old('shop_name') ? : Auth::user()->shop_name   }}"
                                                           required="" aria-required="true" aria-invalid="true" type="text"><label
                                                            id="exampleInput1-error" class="error" for="exampleInput1">Nom
                                                        de votre chaine.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h5 class="info-text"> Are you living in a nice area? </h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-static">Votre adresse</label>
                                        <input class="form-control" type="text" name="address"  value="{{Request::old('address') ? : Auth::user()->address   }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-static">A propos de vous</label>
                                        <textarea name="about" class="form-control"> {{Request::old('about') ? : Auth::user()->about   }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group bmd-form-group">
                                        <input type="text" id="country" data-countrycodeinput="1"
                                               class="form-control" name="country" value="{{Request::old('country') ? : Auth::user()->country   }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mr-auto">
                        <input class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous"
                               value="Previous" type="button">
                    </div>
                    <div class="ml-auto">
                        <input class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next" type="button">
                        <input class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish"
                               style="display: none;" type="submit">
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- wizard container -->
</div>