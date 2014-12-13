@extends('layout')

@section('content')
	<form class="add-item-form" action="/store" method="post">
		<input type="hidden" id="item-category" name="item-category" value="default" />

		<ol class="item-add-steps">
			<li class="step-1">
				<div class="center-container ">
					<h2>Paste</h2>
					
					<input type="text" class="full-input paste-link-input" name="item-link" id="item-link" />
				</div>
			</li>
			<li class="step-2">
				<div class="center-container">
					<h2>Classify</h2>

					<ul class="item-add-categories">
						<li class="item-category item-category-music">
							<a href="#" data-category="music"><span>Music</span></a>
						</li>
						<li class="item-category item-category-video">
							<a href="#" data-category="video"><span>Video</span></a>
						</li>
						<li class="item-category item-category-website">
							<a href="#" data-category="website"><span>Website</span></a>
						</li>
						<li class="item-category item-category-default selected">
							<a href="#" data-category="default"><span>Don't care</span></a>
						</li>
					</ul>

					<input type="submit" value="Save" />
				</div>
			</li>
		</ol>
	</form>
@stop