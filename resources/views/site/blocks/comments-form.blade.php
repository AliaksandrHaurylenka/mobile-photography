
<div class="container-fluid py-5 background-grey">
  <div class="container">
    <div class="card wow fadeIn">
      <div class="card-header font-weight-bold">Оставить отзыв</div>
      <div class="card-body">

        <!-- Default form reply -->
        @if(session('status'))
          <div class="alert alert-success mt-5" role="alert">
            {{session('status')}}
          </div>
        @endif
        @include('admin.errors')

        <form action="/comment" method="post">
          {{ csrf_field() }}
          <!-- <input type="hidden" name="post_id" value=''> -->

          <!-- Comment -->
          <div class="form-group">
            <textarea class="form-control" id="replyFormComment" rows="5" name="message"
                      value="{{old('message')}}" required></textarea>
          </div>

          <div class="text-center mt-4">
            <button class="btn btn-info btn-md btn-form" type="submit">Отправить</button>
          </div>
        </form>
        <!-- Default form reply -->

      </div>
    </div>
  </div>
</div>