<div class="container">

    <!--Comments-->
    <section id="{{$ancors['reviews']}}" class="section mb-5">

        <!--Main wrapper-->
        <div class="comments-list text-center text-md-left">
            <div class="text-center my-5">
                <h3 class="font-weight-bold">Отзывы
                    {{--<span class="badge indigo">{{ $comments->count() }}</span>--}}
                    <span class="badge indigo">{{ App\Comment::count() }}</span>
                </h3>
            </div>

            @if(isset($comments))
                @foreach($comments as $comment)
                <div class="row mb-5">
                    <!--Image column-->
                    <div class="col-sm-2 col-12 mb-3">
                        <img src="/img/comments/avatar/{{ $comment->avatar }}" class="avatar z-depth-1-half" alt="sample image">
                    </div>
                    <!--/.Image column-->

                    <!--Content column-->
                    <div class="col-sm-10 col-12">
                        
                        <h5 class="user-name font-weight-bold">{{ $comment->name }}</h5>
                        
                        <div class="card-data">
                            <ul class="list-unstyled">
                                <li class="comment-date font-small">
                                    <i class="far fa-clock-o"></i> 05/10/2015</li>
                            </ul>
                        </div>
                        <p class="dark-grey-text article">{{ $comment->comment }}</p>
                    </div>
                    <!--/.Content column-->
                </div> 
                @endforeach
            @endif

        </div>
        <!--/.Main wrapper-->

        {{ $comments->links() }}

        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination pg-blue">
                <li class="page-item disabled">
                <a class="page-link" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link">1</a></li>
                <li class="page-item active">
                <a class="page-link">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item">
                <a class="page-link">Next</a>
                </li>
            </ul>
        </nav> -->

    </section>
    <!--/Comments-->

</div>
<!-- Fifth container -->
