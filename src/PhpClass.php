<?php

/**
*
* @author Henrique Fernandez Teixeira
*     
*/

namespace Blacktools\Metabot\Base;

use Blacktools\Metabot\Base\Code;

class PhpClass extends Code
{
    private $_extends;
    private $_implements;
    private $attributes;
    private $methods;
    
    public function __construct($name)
    {   
        parent::__construct($name);
        $this->attributes = [];
        $this->methods = [];
    }

    public function setExtends($extends)
    {
        $this->_extends = $extends;
    }

    public function setImplements($implements)
    {
        $this->_implements = $implements;
    }

    public function setAttribute($privacity, $name)
    {
        $this->attributes[] = "$privacity " .'$'.$name;
    }

    public function setMethod(PhpMethod $method)
    {
        $this->methods[] = $method;
    }
    
    public function getBody($tab = '')
    {  
        $lines = "/**\n";
        $lines .= " * Class " . ucfirst($this->name) . "\n";
        $lines .= " */\n"; 
        $lines .= "class " . ucfirst($this->name);

        if (!empty($this->_extends)) {

            $lines .= " extends " . $this->_extends;
        }
        if (!empty($this->_implements)) {

            $lines .= " implements ". $this->_implements;
        }

        $lines .= $tab."\n{\n\n";

        foreach ($this->attributes as $attribute) {
        
            $lines .=  $tab."\t$attribute;\n";          
        }
        
        $lines .= "\n";
        
        foreach ($this->methods as $method) {
            
            $lines .=  $tab."\t".$method->getBody();          
        }
        
        $lines .= $tab."\t".$this->inner."\n";
        $lines .= "}\n";
        
        return $lines;
    }
    
}