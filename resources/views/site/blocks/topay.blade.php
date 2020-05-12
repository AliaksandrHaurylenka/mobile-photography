<div class="container-fluid background-grey">
    <div class="container">
        <!-- Section: Contact v.2 -->
        <section id="{{$ancors['topay']}}" class="section">

            <!-- Section heading -->
            <h3 class="text-center text-uppercase font-weight-bold pt-5 wow fadeIn" data-wow-delay="0.2s">оплатить курс</h3>

            <!-- Default form subscription -->
            <div class="wow fadeIn pb-5" data-wow-delay="0.4s">
                <form class="text-center p-5 needs-validation" novalidate action="/topay" method="post">
                    {{ csrf_field() }}

                    <p class="h5 font-weight-light text-center mt-2 mb-5 w-responsive mx-auto wow fadeIn" data-wow-delay="0.2s">После оплаты Вам на почту придет  письмо с сылкой на видео-курс</p>

                    <!-- Name -->
                    <input type="text" class="form-control mb-4 mt-3" placeholder="Ваше имя" name="name" required>
                    <div class="invalid-feedback mt-0">
                        Пожалуйста, введите Ваше имя.
                    </div>

                    <!-- Email -->
                    <input type="email" class="form-control mb-4 mt-3" placeholder="E-mail" name="email" required>
                    <div class="invalid-feedback mt-0">
                        Пожалуйста, введите Ваш email.
                    </div>

                    @if(session('status'))
                        <div class="col-12 alert alert-info">
                            {{session('status')}}
                        </div>
                    @endif
                    @include('admin.errors')

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block mt-3" type="submit">Оплатить</button>

                </form>
            </div>
            <!-- Default form subscription -->
        </section>
        <!-- Section: Contact v.2 -->
    </div>
</div>
