{{-- @if(isset($errors) && count($errors)>0) --}}
@if($errors->any())
    <div class="alert alert-dismissable alert-danger fade show">
        <button type="button" data-dismiss="alert" aria-label="Close" class="close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $error)
            <li>
                <strong>{!! $error !!}</strong>
            </li>
        @endforeach
    </div>
@endif
