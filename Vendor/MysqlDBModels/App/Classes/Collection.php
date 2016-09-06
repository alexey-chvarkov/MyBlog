<?php

namespace App\Classes;

//use App\Models\UserRow as UserRow;

class Collection extends Object implements \ArrayAccess, \IteratorAggregate,  \Countable
{
	protected $Type;

	protected $Collection;

	private $offset = 0;


	public function __construct($Type, $Data = array())
	{
		$this->Type = $Type;
		/*
		foreach ($Data as $value) {
			$this->add(new UserRow($this->Connection, $value));
		}
		*/
		$this->Collection = $Data;
	}

	private function isThisType($Type)
	{
		return ($this->Type == $Type);
	}

	public function getType()
	{
		return $this->Type."Collection";
	}

	public function add($object)
	{
		if ($object != null && $this->isThisType($object->getType()))
		{
			$this->Collection[] = $object;	
		}
		return new Collection("User", $this->Collection);
	}

	public function clear()
	{
		$this->Collection = array();
	}

	public function toArray()
	{
		return $this->Collection;
	}

	public function first()
	{
		return ($this->count() >= 1)? $this->Collection[0] : null;
	}

	public function last()
	{
		$count = $this->count();
		return ($count >= 1)? $this->Collection[$count - 1] : null;
	}

	private function __sort($arg1, $arg2, $sorted)
	{
		return ($arg1->$sorted >= $arg2->$sorted)? 1 : -1;
	}

	public function sort()
	{
		$arr = $this->Collection;
		ussort($arr, "__sort");
		return new Collection($this->Type, $this->Collection);
	}

	public function where($where)
	{
		
	}

	public function toString()
	{
		$responce = "\"".$this->Type."Collection\": [ ";
		foreach ($this->Collection as $value) {
			$responce .= $value->toString();
			if (next($this->Collection))
				$responce .= ", ";
		}
		return $responce." ]";
	}

	public function isEmpty()
	{
		return ($this->count == 0);
	}

	public function equal($object)
	{
		return ($this == $object);
	}

	public function getIterator()
	{
		return new CollectionIterator($this->Collection);
	}


	public function offsetExists($offset)
    {
        return isset($this->Collection[$offset]);
    }

    public function offsetGet($offset)
    {
        return ($this->offsetExists($offset)) ? $this->Collection[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->Collection[] = $value;
        }
        else {
            $this->Collection[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->Collection[$offset]);
    }


    public function count()
    {
    	return sizeof($this->Collection);
    }
}





namespace App\Classes;

class CollectionIterator implements \Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        reset($this->var);
    }
  
    public function current()
    {
        $var = current($this->var);
        return $var;
    }
  
    public function key() 
    {
        $var = key($this->var);
        return $var;
    }
  
    public function next() 
    {
        $var = next($this->var);
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

}
