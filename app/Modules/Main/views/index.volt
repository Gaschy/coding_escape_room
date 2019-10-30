<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ url.get("img/logo_tuerkis_transparent.png") }}">

        {{ get_title() }}

        <script>
            function getBaseUri() {
                return '{{ url.getBaseUri() }}';
            }
        </script>

        {{ javascript_include('dist/js/vendors~main.bundle.js') }}
        {{ javascript_include('dist/js/main.bundle.js') }}
    </head>
    <body>
        {{ content() }}
    </body>
</html>
