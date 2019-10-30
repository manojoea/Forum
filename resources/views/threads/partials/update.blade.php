@if(session()->has('msg'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Well done! {{session('msg')}}.</strong>
    </div>


@endif