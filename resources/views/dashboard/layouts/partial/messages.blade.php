@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        @foreach($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@endif

@include('flash::message')
