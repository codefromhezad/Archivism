@extends('layout')

@section('content')
	<ol class="item-add-steps">
		<li class="step-1">
			<h2>Paste</h2>
			<input />
		</li>
		<li class="step-2">
			<h2>Classify</h2>

			<ul class="item-add-categories">
				<li class="item-category item-category-music">
					<a href="#">Music</a>
				</li>
				<li class="item-category item-category-video">
					<a href="#">Video</a>
				</li>
				<li class="item-category item-category-website">
					<a href="#">Website</a>
				</li>
				<li class="item-category item-category-other">
					<a href="#">Other</a>
				</li>
			</ul>
		</li>
	</ol>
@stop