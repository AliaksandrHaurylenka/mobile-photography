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

    @include('site.blocks.head')

<body class="construction-lp">

    @include('site.blocks.header')

    <!-- Main content -->
    <main>

        <div class="container">
            @include('site.blocks.results')
            <hr class="mt-5 pb-4">
            @include('site.blocks.forwhom')
            <hr class="mt-5 pb-4">
            @include('site.blocks.portfolio')
        </div>

        @include('site.blocks.quote')

        @include('site.blocks.programs')

        @include('site.blocks.price')

        @include('site.blocks.streak')

        @include('site.blocks.topay')

        @include('site.blocks.comments')

    </main>
    <!-- Main content -->
    @include('site.blocks.footer')
    @include('site.blocks.scripts')
</body>

</html>
