@extends ('layouts.app')
<style>
td div:nth-of-type(odd) {
    background: #e0e0e0;
}
td div:nth-of-type(even) {
    background: #FFFFFF;
}
</style>
<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }

</script>

@section('content')

<a href="?sort=desc">V</a>
<a href="?sort=asc">^</a>


<div class="container">
  <div clas="row">
    <div class="col-md-6">
      Filter:

      <a href="{{route ('vart.index', ['position'=>request('position'),'sort'=>$adval]) }}">AscTest</a>|
      <a href="{{route ('vart.index', ['position'=>request('position'),'sort'=>'desc']) }}">Desc</a>

      <a href="{{route ('vart.index', ['position'=>request('position'),'sortEmail'=>'asc']) }}">AscEmail</a>|
      <a href="{{route ('vart.index', ['position'=>request('position'),'sortEmail'=>'desc']) }}">DescEmail</a>

      <a href="/">Reset</a>
    </div>
    <div class="col-md-6">
      <a href="?position=1">ITadmin</a>
      <a href="?position=2">Buhalter</a>
    </div>
  </div>
<h1>Vartotojai </h1>
@if(count($posts)>0)

 <div class="container">

  <table class="table">
    <thead>
      <tr>
        <th><a href="{{route ('vart.index', ['position'=>request('position'),'sort'=>$adval]) }}">Vardas</a></th>
        <th><a href="{{route ('vart.index', ['position'=>request('position'),'sortl'=>$adval]) }}">Pavardė</a></th>
        <th>E-Paštas</th>
        <th>Tel. Nr.</th>
        <th>Pareigos</th>

        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        
    
      <tr>
        <td><a href="/vart/{{$post->id}}">{{$post->name}}</a></td>
        <td><a href="/vart/{{$post->id}}">{{$post->last_name}}</a></td>
        <td>{{$post->email}}</td>
        <td>{{$post->phone_nr}}</td>
        <td>{{$position[$post->positon_id]}}</td>
        
        <td><a href="/vart/{{$post->id}}/edit" class="btn btn-default"> Edit</a></td>
        <td>
            {!!Form::open(['action' =>['VartController@destroy', $post->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger' ])}}
            {!!Form::close()!!}
        </td>
      </tr>

    @endforeach

     </tbody>
  </table>
</div>



{{$posts->links()}}

@else
    <p>No posts found</p>
@endif
@endsection