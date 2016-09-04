<?php

namespace App\Classes;

abstract class Object
{
	protected $Type;

	protected function __construct($Type="Object")
	{
		$this->Type = $Type;
	}

	public function getType()
	{
		return $this->Type;
	}

	abstract public function toString();

	abstract public function isEmpty();

	abstract public function equal($object);

}