@extends('layout')

@section('content')
	<ol class="item-add-steps">
		<li class="step-1">
			<div class="center-container ">
				<h2>Paste</h2>
				<form id="paste-link-form" method="post">
					<input type="text" class="full-input paste-link-input" name="arch-link" id="arch-link" />
				</form>
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

				<form class="add-item-form" action="/store" method="post">
					<input type="hidden" id="item-category-input" name="item-category" value="default" />
					<input type="hidden" id="item-link-input" name="item-link" value="" />

					<input type="submit" value="Save" />
				</form>
			</div>
		</li>
	</ol>
@stop