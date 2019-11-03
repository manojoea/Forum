@if(session()->has('msg'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('msg')}}.</strong>
    </div>


@elseif(session()->has('del'))
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{session('del')}}.</strong>
    </div>

@endif