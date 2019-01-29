{!! Form::label('city', 'City', ['class' => 'control-label']) !!}
{!! Form::select('city',$matchedCities, null,
['id' => 'district','class' => 'mdb-select colorful-select dropdown-danger']) !!}