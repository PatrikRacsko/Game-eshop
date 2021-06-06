@if(session('success'))
    <div class="alert alert-success" style="margin-top: 50px;">
        {{session('success')}}
    </div>
@endif