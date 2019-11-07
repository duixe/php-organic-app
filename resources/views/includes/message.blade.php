  <div class="row">
    <div class="col-md">
      @if(isset($errors))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          @foreach($errors as $error_array)
            @foreach($error_array as $error_item)
              <strong>ALERT !!</strong> {{ $error_item }} <br />.
            @endforeach
          @endforeach

          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(isset($success) || \App\Classes\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          @if (@isset($success))
              {{ $success }}
          @elseif (\App\Classes\Session::has('success'))
            {{ \App\Classes\Session::flash('success') }}
          @endif
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>
  </div>
