@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>チーム名： {{ $team->team_name}}</h1>
        <h2>オーナー： {{ $team->user->name}}</h2>
        <h3>メンバー</h3>
        @foreach($team->members as $member)
        <p>{{ $member->pivot->role}}:{{$member->name}}</p>
        @endforeach
    </div>
</div>
@endsection