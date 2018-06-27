@extends ('layouts.app')
@section('content')



<h1>{{$post->name}} {{' '}} {{$post->last_name}} </h1>
E-paštas: {{$post->email}}<br>
Telefonas: {{$post->phone_nr}}<br>
Pareigos: {{$position[$post->positon_id]}}<br>
Pridėtas: {{$post->created_at}}<br>
Atnaujintas: {{$post->updated_at}}<br>


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

<a href="/vart/{{$post->id}}/edit" class="btn btn-default"> Edit</a>
@endsection