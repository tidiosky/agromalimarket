@if(Session::has('info'))
    <div class="alert alert-dismissible alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('info') }} !!
    </div>

@elseif(Session::has('success'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('sucess') }} !!
    </div>

@elseif(Session::has('danger'))
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('danger') }} !!
    </div>

@endif