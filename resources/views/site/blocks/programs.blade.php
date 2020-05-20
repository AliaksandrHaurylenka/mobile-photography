<!-- Section: Programs -->
<div class="container">
    <section id="{{$ancors['program']}}" class="section mt-4 mb-5">

        <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Программа курса</h3>

        {{-- dd($program->subprogrammes[1]->program_id) --}}

        <ul class="list-group list-group-flush">
            @if(isset($programs))
                @foreach($programs as $program)

                {{-- dd($program->subprogrammes[$program->id]->program_id) --}}

                    <li class="list-group-item"><span class="font-weight-bold">Урок {{ $loop->iteration }}. </span>{{ $program->lessons }}</li>
                   {{-- @if($subprogramme->program->id == $program->id)--}}
                   {{-- @if($program->subprogrammes[$program->id]->program_id) --}}
                    @if(!empty($program->subprogrammes))
                        <ul class="list-group list-group-flush">
                            @foreach($program->subprogrammes as $subprogramme)
                                <li class="list-group-item pl-5"><i class="fas fa-circle pr-2"></i> {{ $subprogramme->title }}</li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            @endif
        </ul>

        <p class="text-center mt-4 h5 font-weight-light">Измени свой instagram <i class="fab fa-instagram"></i> в лучшую сторону!</p>

    </section>
<!-- Section: Programs -->
</div>
