@extends ('layouts.app')
@section('content')
<h1>Vartotojai </h1>

<h1>Edit  </h1>
{!! Form::open(['action'=> ['VartController@update', $post->id], 'method' => 'POST']) !!}
    
    
        {{Form::hidden('id', $post->id)}}
    <div class="form-group">
        {{Form::label('name','Vardas')}}
        {{Form::text('name', $post->name, ['class'=> 'form-control','placeholder'=>'Antanas'])}}
    </div>
    <div class="form-group">
        {{Form::label('last_name','Pardė')}}
        {{Form::text('last_name', $post->last_name, ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
     <div class="form-group">
        {{Form::label('email','E-Pastas')}}
        {{Form::text('email', $post->email, ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
   <div class="form-group">
        {{Form::label('phone','Tel Nr.')}}
        {{Form::text('phone', $post->phone_nr, ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
 <div class="form-group">
        {{Form::label('position','Position')}}
        {{Form::select('position', $position, $post->position_id   )}};
 </div>
 {{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit', ['class' => 'btn btn-primary'])}} <hr>

{!! Form::close() !!}

 {!!Form::open(['action' =>['VartController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!! Form::close() !!}





{!! Form::open(['action'=> ['PcListController@update', $post->id], 'method' => 'POST']) !!}


  <div class="form-group">
        {{Form::label('computer','Computer')}}
        {{Form::select('computer', $computer, null,  ['placeholder' => '_']  )}};
 </div>


{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit', ['class' => 'btn btn-primary'])}} 
{!! Form::close() !!}




 @if(count($pc_list)>0)
<div class="well">
@foreach($pc_list as $pc)
 <a href="/computer/{{$pc->id}}">{{$pc->pc_id}}</a>
 {!!Form::open(['action' =>['PcListController@destroy', $pc->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
<hr>

@endforeach
</div>
 @endif



@endsection