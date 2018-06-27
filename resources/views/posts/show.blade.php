@extends ('layouts.app')

@section('content')
<a href="/computer" class="btn btn-default">Go Back </a>
<h1>{{$post->pc_id}} </h1>
Kompiuterio vardas: {{$post->pc_name}} <br>
Procesorius: {{$cpu[$post->cpu_id]}} <br>
OS: {{$os[$post->os_id]}} <br>
Vaizdo plokste: {{$gpu[$post->gpu_id]}} <br>
Buvimo vieta: {{$place[$post->place_id]}} <br>
Paskirtis: {{$purpose[$post->purpose_id]}} <br>

@if ($vart != "")
Naudojama: <a href="/vart/{{$vart->id}}">{{$vart->name}}{{" "}}{{$vart->last_name}}</a><br>
@else
Naudojama: NE <br>
@endif
PRidetas: {{$post->createrd_at}} <br>
Atnaujintas: {{$post->updated_at}} <br>


<hr>
<a href="/computer/{{$post->id}}/edit" class="btn btn-default"> Edit</a>

{!!Form::open(['action' =>['PcController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
@endsection