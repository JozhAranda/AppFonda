<?php

class UsersController extends BaseController {

	public function index()
	{
		$foods = Food::all();
		View::make('food')
	}

	public function create()
	{
	}

	public function store()
	{
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}

}