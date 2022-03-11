<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PHP Coding') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/font-awesome/5.3/css/all.min.css')}}" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('assets/plugins/DataTables/media/css/dataTables.jqueryui.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.dataTables.min.css')}}">
        
   
        
        @stack('css')
        <!-- Scripts -->
        
        <style type="text/css">
        .help-block{
            color:red;
        }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/plugins/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/4.1.3/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/plugins/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/media/js/dataTables.jqueryui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
   

    @stack('scripts')
    </body>
</html>
