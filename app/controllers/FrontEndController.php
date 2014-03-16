<?php

class FrontEndController extends BaseController {

	/**
	 * Display Home Page.
	 *
	 * @return Response
	 */
	public function home()
	{
        return View::make('frontend.index');
	}

	/**
	 * Display About Page.
	 *
	 * @return Response
	 */
	public function about()
	{
        return View::make('frontend.about');
	}

	/**
	 * Display Contact Us Page.
	 *
	 * @return Response
	 */
	public function contact()
	{
        return View::make('frontend.contact');
	}

}
