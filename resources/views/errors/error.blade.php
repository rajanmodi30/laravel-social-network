


  @if (count($errors)>0)

    @foreach ($errors->all() as $error)

<div class="row">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">  {{ $error }}</h3>
    </div>
  </div>

</div>
    @endforeach

  @endif


@if(Session::has('message'))

<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">{{ Session::get('message')}}
</h3>
  </div>
</div>
@endif
