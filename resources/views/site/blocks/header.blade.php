<!-- Navigation & Intro -->
<header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto smooth-scroll">
                @if(isset($main_menu))
                    @foreach($main_menu as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="#{{$item->link}}">{{$item->title}}</a>
                    </li>
                    @endforeach
                @endif
            </ul>
            <!-- Social Icon  -->
            <ul class="navbar-nav nav-flex-icons">
                @if(isset($social))
                    @foreach($social as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$item->link}}"><i class="fab fa-{{$item->title}}"></i></a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Intro Section -->
<div id="{{$ancors['home']}}" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(img/phone-690091_1280.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-black-light">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row smooth-scroll">
                <div class="col-md-12 text-center">
                    <div class="text-white wow fadeInDown">
                        <h1 class="h1-responsive text-uppercase font-weight-bold">мобильная фотография</h1>
                        <hr class="hr-light my-4">
                        <h4 class="subtext-header white-text mb-3">Видео-курс по мобильной обработке "Визуал на миллион"</h4>
                    </div>
                    <a href="#contact" data-offset="100" class="btn blue-gradient btn-rounded wow fadeInUp" data-wow-delay="0.2s">Купить курс</a>
                </div>
            </div>
        </div>
    </div>
</div>

</header>
<!-- Navigation & Intro -->
