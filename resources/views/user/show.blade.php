@extends('layout.main')

@section('title', 'użytkownik')

@section('sidebar')
    @parent <!-- ta dyrektywa powoduje, że rodzic nie jesty nadpisywany, tylko powielany tutaj -->
    naspisujemy menu
    @auth
     <ul>
         <li><a href="#">link tylko dla zalogowanych użytkowników</a></li>
     </ul>
    @endauth
@endsection

<a href="{{ route('get.users') }}">WSZYSCY</a>
<br>


@if (session('Losowanko')===0)
    <div class="alert alert-danger" role="alert">
    wylosowano 0
    </div>
@elseif (session('Losowanko')===1)
    <div class="alert alert-success" role="alert">
    wylosowano 1
    </div>
@else
    <div class="alert alert-dark" role="alert">
    nic nie wylosowano
    </div>
@endif


@isset($nick)
    pokaże nick tylko wtedy, kiedy on jest zainicjowany
@else
    nie ma zdefiniowanego Nicka
@endisset

@empty($nick)
    pokaże ten napis tylko wtedy, kiedy zmienna jest pusta
@else
    zmienna Nick nie jest pusta
@endisset


@section('content')
    <h1>Show</h1>



    <div class="card">
        <h5 class="card-header">{{ $user['name'] }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $user['id'] }}</li>
                <li>Imię: {{ $user['firstName'] }}</li>
                <li>Nazwisko: {{ $user['lastName'] }}</li>
                <li>Miasto: {{ $user['city'] }}</li>
                <li>Wiek: {{ $user['age'] }}</li>
            </ul>

            <a href="{{ route('get.users') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
    </div>


    <hr>
    <hr>
    <hr>
    <hr>


    <table>
        <thead>
            <tr>
                <th>Index</th>
                <th>Iteracja</th>
                <th>ID</th>
                <th>Imię</th>
                <th>opcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @include('user.userrow', ['userData' => $user])
            @endforeach
            @each('user.userrow', $users, 'userData')
        </tbody>
    </table>

    <hr>
    <hr>

    <ol>
    @php
        $i=1;
    @endphp
    @foreach ($users as $user)
        <li> {{ $user['imie'] }}  {{ $user['nazwisko'] }}  ; {{ $user['promotor'] }} </li>
        @php
            $i++;
        @endphp
    @endforeach
    </ol>

    <ol>
    @php
        $usersX=[];
        $i=1;
    @endphp
    @forelse ($users as $user)

        @if ($i++ >= 3)
            <li>pominięcie pętli dla danego elementu</li>
            @continue
        @endif
        <!-- powyższy element można zapisać @ continue($i++ >= 3) -->

        <li> {{ $user['imie'] }}  {{ $user['nazwisko'] }}  ; {{ $user['promotor'] }} ({{ $user['id'] }})</li>


        @if ($i++ >= 6)
            <li>przerwanie pętli</li>
            @break
        @endif
        <!-- powyższy element można zapisać @ break($i++ >= 6) -->


    @empty
        <li> Tu NIC NIE MA :)</li>
    @endforelse
    </ol>

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
