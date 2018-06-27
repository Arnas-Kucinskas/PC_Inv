@extends ('layouts.app')

@section('content')
<h1>Create  </h1>
{!! Form::open(['action'=> 'PcController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('pc_id','PC ID')}}
        {{Form::text('pc_id', '', ['class'=> 'form-control','placeholder'=>'E000'])}}
    </div>
    <div class="form-group">
        {{Form::label('pc_name','PC Vardas')}}
        {{Form::text('pc_name', '', ['class'=> 'form-control','placeholder'=>'E000(Jono)'])}}
    </div>
<div class="form-group">
        {{Form::label('cpu','CPU')}}
        {{Form::select('cpu', $cpu,  ['class'=> 'form-control'] )}};
    </div>
 <div class="form-group">
        {{Form::label('gpu','GPU')}}
        {{Form::select('gpu', $gpu,  ['class'=> 'form-control'] )}};
 </div>
<div class="form-group">
        {{Form::label('os','OS')}}
        {{Form::select('os' ,$os, 'S'   )}};
 </div>
 <div class="form-group">
        {{Form::label('place','Place')}}
        {{Form::select('place', $place,  ['class'=> 'form-control'] )}};
 </div>

 <div class="form-group">
        {{Form::label('purpose','Purpose')}}
        {{Form::select('purpose', $purpose,  ['class'=> 'form-control'] )}};
 </div>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}


@endsection