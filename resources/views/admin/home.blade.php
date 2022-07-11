@extends('dashboard')

@section('content')
    <h1>Ciao {{ $user['name'] }}</h1>
    @if ($userInfo)
        <p>Telefono: {{ $userInfo->phone }}</p>
        <p>Paese: {{ $userInfo->country }}</p>
        <p>Città: {{ $userInfo->city }}</p>
        <p>Indirizzo: {{ $userInfo->address }}</p>
    @endif
@endsection
