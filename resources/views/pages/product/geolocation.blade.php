@extends("layout.app",['titre' => 'Geolocalisation'])
@section('js')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6o2C-U1vXjo_xGBqJ8Z2RV5AFFpnCJHY&libraries=places"></script>
    <script type="text/javascript" src="{{ asset('js/google.maps.api.js') }}"></script>
@endsection
@section("map")
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <div id="map" class="big-map" style="height: 700px;"></div>
    {{--<div id="map" style="height: 500px" class="rounded z-depth-1-half map-container"></div>--}}
    {{--<br>--}}
    {{--<h2>Form</h2>--}}
    {{--<blockquote class="blockquote bq-success">--}}
    {{--<p class="bq-title">Recherche</p>--}}
    {{--{!! Form::open([]) !!}--}}
    {{--<div class="form-group">--}}
    {{--{!! Form::label('district', 'District', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::select('district', $districts, null,--}}
    {{--['id' => 'district','class' => 'custom-select colorful-select dropdown-danger']) !!}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}
    {{--<div id="city"></div>--}}
    {{--</blockquote>--}}


    {{--{!! Form::open([]) !!}--}}
    {{--{!! Form::select('size',['L' => 'Laravel','J' => 'Java']) !!}--}}
    {{--{!! Form::close() !!}--}}

@endsection