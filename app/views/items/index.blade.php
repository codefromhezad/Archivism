@extends('layout')

@section('content')
	<div class="center-container">
		<ul class="items-index">
			@foreach($items as $item)
				<li class="arch-item">
					<div class="inner-item">
						<h3>{{ $item->name }}</h3>
						<div class="item-metas">
							<span class="item-date">Added {{ $item->created_at }}</span>
							<a class="item-goto" href="{{ $item->href }}" target="_blank">See more on <em>{{ ArchProvider::$providers[$item->provider] }}</em></a>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
@stop