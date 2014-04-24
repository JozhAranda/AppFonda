<?php
class Food extends Eloquent {

	protected $table = 'foods';

	public static $createRules = array(
		'name' 			=> 'required',
		'description' 	=> 'required'
	);

	public static $updateRules = array(
		'name' 			=> 'required',
		'description' 	=> 'required'
	);

	protected $softDelete = true;

}
?>