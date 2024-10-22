@extends('admin.layouts.app')

@section('title', 'Create')
@section('content')

    <h1>Create user new</h1>

    <x-alert></x-alert>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" value=" {{ old('name') }} ">
        <input type="email" name="email" placeholder="Email" value=" {{ old('email') }} ">
        <input type="password" name="password" placeholder="PassWord">
        <button type="submit">Create User</button>
    </form>

@endsection