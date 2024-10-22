@extends('admin.layouts.app')

@section('title', 'Detals')
@section('content')
    <h1>Detals {{ $user->name }} </h1>

    <p>Name: <strong> {{ $user->name }}</strong> </p>
    <p>Email: <strong> {{ $user->email }} </strong> </p>
    <br>
    <x-alert></x-alert>
    <br>

    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    @endcan

    <a href="{{ route('users.index') }}" class="btn btn-primary">Home Back</a>
    
@endsection