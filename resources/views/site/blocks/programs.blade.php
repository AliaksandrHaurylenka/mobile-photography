<!-- Section: Programs -->
<div class="container">
    <section id="{{$ancors['program']}}" class="section mt-4 mb-5">

        <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Программа курса</h3>

        <ul class="list-group list-group-flush">
            @if(isset($program))
                @foreach($program as $item)
                    <li class="list-group-item"><span class="font-weight-bold">Урок {{ $loop->iteration }}. </span>
                        {{$item->lessons}}
                    </li>
                @endforeach
            @endif

        </ul>

        <p class="text-center mt-4 h5 font-weight-light">Измени свой instagram <i class="fab fa-instagram"></i> в лучшую сторону!</p>

    </section>
<!-- Section: Programs -->
</div>
