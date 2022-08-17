

@if (Session::has('error'))
<div class="alert alert-light">
  <span style="color: rgb(255, 0, 0)">{{Session::get('error')}}</span>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success">
  <span style="color: white">{{Session::get('success')}}</span>
</div>
@endif

