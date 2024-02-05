<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Styles -->
    {{-- <style>
        body {
            font-family: "Nunito", sans-serif;
            display: flex;
            justify-content: center;
        }
    </style> --}}
</head>

<body>
    <div id="app">
        <example-component></example-component>
        {{-- <other-component></other-component> --}}
    </div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
