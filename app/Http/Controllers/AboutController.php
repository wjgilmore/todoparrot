<?php namespace Todoparrot\Http\Controllers;

use Todoparrot\Http\Requests;
use Todoparrot\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutController extends Controller {

	public function index()
	{
		return view('about.index');
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

}
