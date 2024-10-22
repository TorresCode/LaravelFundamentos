@extends('admin.layouts.app')

@section('title', 'Update')
@section('content')
    
    <h1>Update User {{ $user->name }}</h1>
    <x-alert></x-alert>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $user->name }}">
        <input type="email" name="email" value="{{ $user->email }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
@endsection