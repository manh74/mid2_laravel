@if(Session::has('flag'))
    <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
@endif
