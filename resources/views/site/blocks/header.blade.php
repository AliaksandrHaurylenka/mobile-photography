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
                                <a class="nav-link" href="http://{{ $item->link }}" target="_blank"><i class="fab fa-{{ $item->title }}"></i></a>
                            </li>
                        @endforeach
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/admin" target="_blank"><i class="far fa-user-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Intro Section -->
    <div id="{{$ancors['home']}}" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('img/{{$main_images["main"]}}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-light"></div>
    </div>

</header>
<!-- Navigation & Intro -->