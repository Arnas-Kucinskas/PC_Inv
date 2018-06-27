@extends ('layouts.app')

<style>
td div:nth-of-type(odd) {
    background: #e00000;
}
td div:nth-of-type(even) {
    background: #FFFFFF;
}

table.sortable thead {
    background-color:#eee;
    color:#666666;
    font-weight: bold;
    cursor: default;
}
</style>

@section('content')
<h1>Post </h1>

{!! Form::open(['action'=> ['PcController@filterOS' ], 'method' => 'POST']) !!}
{!!Form::open()!!}
    @foreach($os as $oss)
    {{ Form::label($oss) }} 
    {{ Form::checkbox($oss,$oss) }}<br>
    @endforeach
{{Form::submit('Submit', ['class' => 'btn btn-primary'])}} <hr>
{!!Form::close()!!}




 {!!Form::open()!!}
@foreach($gpu as $gpuu)
{{ Form::label($gpuu) }} 
{{ Form::checkbox($gpuu) }}<br>
@endforeach
 {!!Form::close()!!}



 {!!Form::open()!!}
@foreach($place as $placee)
{{ Form::label($placee) }} 
{{ Form::checkbox($placee) }}<br>
@endforeach
 {!!Form::close()!!}

{!!Form::open()!!}
@foreach($purpose as $purposee)
{{ Form::label($purposee) }} 
{{ Form::checkbox($purposee) }}<br>
@endforeach
 {!!Form::close()!!}



<div class="container">
  <div clas="row">
    <div class="col-md-6">
      Filter:
      
      <a href="{{route ('vart.index', ['position'=>request('position'),'sort'=>'asc']) }}">AscTest</a>|
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

@if(count($posts)>0)


 <div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>PC ID</th>
        <th>PC Vardas</th>
        <th>OS</th>
        <th>CPU</th>
        <th>GPU</th>
        <th>Vieta</th>
        <th>Paskirtis</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        
    
      <tr>
        <td><a href="/computer/{{$post->id}}">{{$post->pc_id}}</a></td>
        <td>{{$post->pc_name}}</td>
        <td>{{$os[$post->os_id]}}</td>
        <td>{{$cpu[$post->cpu_id]}}</td>
        <td>{{$gpu[$post->gpu_id]}}</td>
        <td>{{$place[$post->place_id]}}</td>
        <td>{{$purpose[$post->purpose_id]}}</td>
        <td><a href="/computer/{{$post->id}}/edit" class="btn btn-default"> Edit</a></td>
        
      </tr>

    @endforeach

     </tbody>
  </table>
</div>

@else
    <p>No posts found</p>
@endif
@endsection