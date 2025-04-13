<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="{{ asset('../assets/img/favicon.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('../assets/img/apple-icon.png') }}" />
        
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

         <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('../assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('../assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Popper -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
   
        <!-- Main Styling -->
        <link href="{{ asset('../assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>

    @auth
    <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    @else
    <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @endauth

        @inertia
    </body>
    <!-- plugin for charts  -->
    <script src="./assets/js/plugins/chartjs.min.js" async></script>
 
    <!-- plugin for scrollbar  -->
    <script src="{{ asset('../assets/js/plugins/perfect-scrollbar.min.j') }}s" async></script>
    <!-- main script file  -->
    <script src="{{ asset('../assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</html>
