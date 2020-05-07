<div class="container-fluid background-grey">

    <div class="container">
        <!-- Section: Pricing -->
        <section id="pricing" class="section mt-4">

            <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Стоимость курса</h3>

            <div class="row justify-content-center">
                <ul class="list-group pb-5 col-sm-5">
                    @if(isset($prices))
                        @foreach($prices as $price)
                            <li class="list-group-item">
                                <div class="md-v-line"></div><img src='{{ asset("img/$price->flag") }}' class="img-fluid mr-5" alt="{{ $price->currency }}">{{ $price->price }} {{ $price->currency }}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

        </section>
        <!-- Section: Pricing -->
    </div>

</div>
