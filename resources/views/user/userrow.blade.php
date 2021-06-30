{{-- @isset($loop)
@if ($loop->first)
    <tr style="background:red">
@elseif ($loop->last)
    <tr style="background:green">
@else
    <tr>
@endif
@else
    <tr>
@endisset --}}
<tr>
    <td>{ $loop->index }</td>
    <td>{ $loop->iteration }</td>
    <td>{{ $userData['id'] }}</td>
    <td>{{ $userData['imie'] }}</td>
    <td></td>
</tr>
