<?php

class ArchItemController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		echo "<p>This is the index but there's nothing here.</p>
			  <p>Well, there's this message ... But you get my point</p>
			  <p>Anyway, you wanna head to <a href='/create'>/create</a>";
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('items.add', array('itemKinds' => ArchItemKind::$kinds));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * AJAX: Check provider type of the content
	 *
	 * @param  string $url
	 * @return JSON Response
	 */
	public function providerType()
	{
		if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
            	'status' => 'error',
                'msg'    => 'Unauthorized attempt to create setting'
            ) );
        }

        $url = Input::get('url');

		$provider = ArchProvider::check($url);

		return Response::json( array(
        	'status' => 'ok',
            'slug'    => $provider->slug
        ) );
	}
}
