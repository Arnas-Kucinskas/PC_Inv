@extends ('layouts.app')
@section('content')
<h1>Vartotojai </h1>

<h1>Create  </h1>
{!! Form::open(['action'=> 'VartController@store', 'method' => 'POST']) !!}

        
    <div class="form-group">
        {{Form::label('name','Vardas')}}
        {{Form::text('name', '', ['class'=> 'form-control','placeholder'=>'Antanas'])}}
    </div>
    <div class="form-group">
        {{Form::label('last_name','Pardė')}}
        {{Form::text('last_name', '', ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
     <div class="form-group">
        {{Form::label('email','E-Pastas')}}
        {{Form::text('email', '', ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
   <div class="form-group">
        {{Form::label('phone','Tel Nr.')}}
        {{Form::text('phone', '', ['class'=> 'form-control','placeholder'=>'TTT'])}}
    </div>
 <div class="form-group">
        {{Form::label('position','Position')}}
        {{Form::select('position', $position,  ['class'=> 'form-control'] )}};
 </div>

 

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}




@endsection