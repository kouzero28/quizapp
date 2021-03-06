@section('head')

    <head>
        <meta http-equiv="content-type" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
@endsection
