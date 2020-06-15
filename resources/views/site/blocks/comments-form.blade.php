
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

        <form action="/comment" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
          </div>

          <!-- Comment -->
          <div class="form-group">
            <textarea class="form-control" rows="5" name="comment" value="{{old('comment')}}" required></textarea>
          </div>       

          <div class="form-group">
            <label for="avatar">Аватар</label>
            <br>
            <input type="file" name="avatar" id="avatar">
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