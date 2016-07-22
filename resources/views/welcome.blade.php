<!DOCTYPE html>
<html>
    <head>
        <title>Fryst</title>

        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom.css">

    </head>
    <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fryst.xyz

                  <div class="pull-right">

                    @yield('menubar')

                  </div>

                </div>
                <div class="panel-body">

                @yield('content')

                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://code.jquery.com/ui/1.12.0/jquery-ui.min.js'></script>
<link rel=stylesheet href="https://code.jquery.com/ui/1.12.0/themes/vader/jquery-ui.css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
});

</script>
@yield('scripts')
    </body>
</html>
