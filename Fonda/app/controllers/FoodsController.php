<?php

class FoodsController extends BaseController {

	public function index()
	{
		$foods = Food::paginate(5);
		return View::make('foods.index', compact('foods'));
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