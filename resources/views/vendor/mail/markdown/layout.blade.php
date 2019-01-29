{!! strip_tags($header) !!}

{!! strip_tags($slot) !!}

@isset($subcopy)
    <link href="{{ asset("css/materia.css") }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
{!! strip_tags($subcopy) !!}
@endisset

{!! strip_tags($footer) !!}
