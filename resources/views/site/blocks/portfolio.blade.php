<!-- Section: Portfolio -->
<section id="{{$ancors['portfolio']}}" class="section mb-5">

<!-- Section heading -->
<h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-4 wow fadeIn" data-wow-delay="0.2s">Мои работы</h3>

<!-- Grid row -->
<div class="row wow fadeIn" data-wow-delay="0.4s">

    <!-- Grid column -->
    <div class="col-md-12">

        <!--  Nav tabs  -->
        <ul class="nav md-pills flex-center flex-wrap mx-0 mb-4" role="tablist">
            @if(isset($categories))
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link {{$category->active}} font-weight-bold text-uppercase" data-toggle="tab" href="#{{$category->link}}" role="tab">
                            <br>{{$category->title}}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>

    </div>
    <!-- Grid column -->

    <!-- Tab panels -->
    <div class="tab-content pt-0">

        <!-- Panel 1 -->
        <!-- <div class="tab-pane fade show in active text-center" id="panel31" role="tabpanel"> -->
        <div class="tab-pane fade show in active text-center" id="{{App\Category::find(1)->link}}" role="tabpanel">
            <br>

            <!-- Grid row -->
            <div class="row justify-content-center">
                <!-- Grid column -->
                <div class="col-md-6 mb-5">
                    <video class="video-fluid z-depth-1" controls poster="/img/portfolio/poster11.jpg">
                        <source src="/img/portfolio/IMG_6775.MOV" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    </video>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

        </div>
        <!-- Panel 1 -->

        <!-- Panel 2 -->
        <div class="tab-pane fade" id="{{App\Category::find(2)->link}}" role="tabpanel">
            <br>

            <!-- Grid row -->
            <div class="row text-center">

                <!-- Grid column -->
                <div class="col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%286%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%285%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Panel 2 -->

        <!-- Panel 3 -->
        <div class="tab-pane fade" id="panel33" role="tabpanel">
            <br>

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%2810%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%2813%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%2814%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Panel 3 -->

        <!-- Panel 4 -->
        <div class="tab-pane fade" id="panel34" role="tabpanel">
            <br>

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%289%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%288%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-5">

                    <!-- Featured image -->
                    <div class="view overlay z-depth-1 zoom">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Architecture/4-col/img%20%286%29.jpg" class="img-fluid">
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Panel 4 -->

    </div>
    <!-- Tab panels -->

</div>
<!-- Grid row -->

</section>
<!-- Section: Portfolio -->
