<h1> widok index </h1>

<ol>
<?php $i=0; ?>
@foreach ($gamelist as $onegame)
<li>{{$onegame['name']}}</li>

nie mogę wywołać create, edit

{{ Form::open(array('url' => 'games/', 'method' => 'GET', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('GET ONE - index')}}
{{ Form::close() }}

{{ Form::open(array('url' => 'games/'.$i++, 'method' => 'GET', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('GET ONE - show ')}}
{{ Form::close() }}

{{ Form::open(array('url' => 'games/', 'method' => 'POST', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('POST NEW - store')}}
{{ Form::close() }}

{{ Form::open(array('url' => 'games/'.$i++, 'method' => 'PUT', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('UPDATE-REPLACE - update')}}
{{ Form::close() }}

{{ Form::open(array('url' => 'games/'.$i++, 'method' => 'PATCH', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('UPDATE-MODIFY - update')}}
{{ Form::close() }}

{{ Form::open(array('url' => 'games/'.$i++, 'method' => 'DELETE', 'class'=>'col-md-12')) }}
<!--Form::token()-->
{{Form::submit('DELETE - destroy')}}
{{ Form::close() }}


@endforeach
</ol>
<ol>CRUD
<li>GET . - READ ALL (index)</li>
<li>GET/id - READ ONE (show)</li>
<li>POST - CREATE ()</li>
<li>PUT - UPDATE-REPLACE ()</li>
<li>PATCH - UPDATE-MODIFY ()</li>
<li>DELETE - DELETE ()</li>
</ol>


