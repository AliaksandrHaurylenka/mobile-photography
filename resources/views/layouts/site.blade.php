<?php
//phpinfo();
  header('Content-Type: text/html; charset=utf-8');

//Включение всех ошибок и предупреждений
  ini_set('error_reporting', E_ALL);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html lang="ru">

    @yield('head')

<body class="construction-lp">

    @yield('header')

    <!-- Main content -->
    <main>

        <div class="container">
            @yield('results')
            <hr class="mt-5 pb-4">
            @yield('forwhom')
            <hr class="mt-5 pb-4">
            @yield('portfolio')
        </div>

        @yield('quote')

        @yield('programs')

        @yield('price')

        @yield('streak')

        @yield('topay')

        @yield('comments')

        @yield('comments-form')

    </main>
    <!-- Main content -->
    @yield('footer')
    @yield('scripts')
</body>

</html>
