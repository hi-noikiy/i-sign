@if( count($errors) > 0 )
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Oh Something was wrong!</strong> {{ $error }}
        </div>
    @endforeach
@endif