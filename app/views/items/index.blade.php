@extends('layout')

@section('content')
	<ul class="items-index">
		@foreach($items as $item)
			<li class="arch-item">
				<pre>
					<?php var_dump($item); ?>
				</pre>
				<hr>
			</li>
		@endforeach
	</ul>
@stop