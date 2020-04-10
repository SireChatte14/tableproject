@if(Session::get('success'))
    <p class="alert alert-success">{{Session::get('success')}}</p>
@endif
@if(Session::get('danger'))
    <p class="alert alert-danger">{{Session::get('danger')}}</p>
@endif
@if(Session::get('warning'))
    <p class="alert alert-warning">{{Session::get('warning')}}</p>
@endif
