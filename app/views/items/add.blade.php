@extends('layout')

@section('content')
	<form class="add-item-form" action="/store" method="post">
		{{ Form::token() }}

		<input type="hidden" id="item-kind" name="item-kind" value="default" />
		<input type="hidden" id="item-provider" name="item-provider" value="default" />

		<ol class="item-add-steps">
			<li class="step-1">
				<div class="center-container vertical-center-please">
					<h2>Paste</h2>
					
					<input type="text" class="full-input paste-link-input" name="item-link" id="item-link" />
				</div>
			</li>
			<li class="step-2">
				<div class="center-container vertical-center-please">
					<h2>Classify <small class="classify-message"></small></h2>

					<ul class="item-add-categories">
						@foreach($itemKinds as $kindSlug => $kindLabel)
							<li class="item-kind item-kind-{{ $kindSlug }} @if($kindSlug == 'default') selected @endif">
								<a href="#" data-kind="{{ $kindSlug }}"><span>{{ $kindLabel }}</span></a>
							</li>
						@endforeach
						<li class="clear-float-helper"></li>
					</ul>

					<input type="submit" value="Save" />
				</div>
			</li>
		</ol>
	</form>
@stop