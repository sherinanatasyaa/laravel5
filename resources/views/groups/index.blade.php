@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<a href="/groups/create" class="badge bg-primary">Add Groups</a>
    <div class="row mt-3">
		<div class="col-md-6">

@foreach($groups as $group)

<div class="card border-success" style="width: 18rem;">
    <div class="card-body">
        <a href="/groups/{{ $group['id'] }}" class="card-title">{{ $group['name'] }}</a>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $group['description'] }}</li>
        </ul>

        <hr>
        <a href="" class="badge bg-primary">Add Member</a>
            <div class="row mt-3">
		        <div class="col-md-6">
            @foreach ($group->friends as $friend)
                <li> {{$friend->nama}} </li>
            @endforeach
            </div>
                </div>
        <hr>

        <a href="/groups/{{ $group['id'] }}/edit" class="badge bg-warning">Edit</a>
        <form action="/groups/{{ $group['id'] }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="badge bg-danger">Delete</button>
        </form>
    </div>
</div>

@endforeach

<div>
<div class="row mt-3">
		<div class="col-md-6">
{{ $groups->links() }}
</div>
</div>
</div>

@endsection