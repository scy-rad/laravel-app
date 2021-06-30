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
