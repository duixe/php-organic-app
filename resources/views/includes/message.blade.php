  <div class="row">
    <div class="col-md">
      @if(isset($errors) || \App\Classes\Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          @if(\App\Classes\Session::has('error'))
            <h5>{{ \App\Classes\Session::flash('error') }}</h5>
          @else

            @foreach($errors as $error_array)
              @foreach($error_array as $error_item)
                <h5><strong>ALERT !!</strong> {{ $error_item }} <br /></h5>
              @endforeach
            @endforeach

         @endif
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if(isset($success) || \App\Classes\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          @if (@isset($success))
              <h5>{{ $success }}</h5>
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
