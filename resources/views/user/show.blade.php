@extends('layout.main')

@section('title', 'użytkownik')

@section('sidebar')
    @parent <!-- ta dyrektywa powoduje, że rodzic nie jesty nadpisywany, tylko powielany tutaj -->
    naspisujemy menu
@endsection

@section('content')
    <h1>Show</h1>
    <ul>
        <li>Name: Tom</li>
    </ul>

    <div>
    zmienna example: {{ $userID }}
    </div>


    <div>
        zmienna współdzielona w AppServiceProvider: {{ $applicationName }}
    </div>

    <div>
        zmienna współdzielona przez fasadę w AppServiceProvider: {{ $FasadaName }}
    </div>


@endsection
