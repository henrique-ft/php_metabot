<?php

/**
*
* @author Henrique Fernandez Teixeira
*     
*/

namespace Blacktools\Metabot\Base;

abstract class Code
{
    protected $name;
    protected $inner;   
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->inner = '';
    }
    
    public function setInner($inner)
    {
        $this->inner = $inner;
    }
    
    abstract public function getBody();
}