@extends ('layouts.app')

@section('content')
<h1>Edit  </h1>
{!! Form::open(['action'=> ['PcController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('pc_id','PC ID')}}
        {{Form::text('pc_id', $post->pc_id, ['class'=> 'form-control','placeholder'=>'E000'])}}
    </div>
    <div class="form-group">
        {{Form::label('pc_name','PC Vardas')}}
        {{Form::text('pc_name', $post->pc_name, ['class'=> 'form-control','placeholder'=>'E000(Jono)'])}}
    </div>
<div class="form-group">
        
        {{Form::label('cpu','CPU')}}
        {{Form::select('cpu', $cpu, $post->cpu_id )}};
    </div>
 <div class="form-group">
        {{Form::label('gpu','GPU')}}
        {{Form::select('gpu', $gpu, $post->gpu_id  )}};
 </div>
<div class="form-group">
        {{Form::label('os','OS')}}
        {{Form::select('os' ,$os, $post->os_id   )}};
 </div>
 <div class="form-group">
        {{Form::label('place','Place')}}
        {{Form::select('place', $place, $post->place_id )}};
 </div>
 <div class="form-group">
        {{Form::label('position','Position')}}
        {{Form::select('position', $position, $post->position_id  )}};
 </div>
 <div class="form-group">
        {{Form::label('purpose','Purpose')}}
        {{Form::select('purpose', $purpose, $post->purpose_id  )}};
 </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}


@endsection