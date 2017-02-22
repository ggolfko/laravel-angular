<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		return view('templates/dashboard');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function ltts()
	{
		return view('templates/ltts');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function maps()
	{
		return view('templates/maps');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function newsfeed()
	{
		return view('templates/newsfeed');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function messages()
	{
		return view('templates/messages');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function listtrain()
	{
		return view('templates/listtrain');
	}


}
