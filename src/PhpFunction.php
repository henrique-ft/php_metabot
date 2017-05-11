<?php

/**
*
* @author Henrique Fernandez Teixeira
*     
*/

namespace Blacktools\Metabot\Base;

use Blacktools\Metabot\Base\Code;

class PhpFunction extends Code
{
    private $parameters;
    
    public function __construct($name)
    {   
        parent::__construct($name);
        $this->parameters = [];
    }
    
    public function setParameter($typehint = null, $parameter, $default = null)
    {   
        if ($typehint !== null) {
            
            $typehint = $typehint . ' ';
        }
        
        if ($default === null) {

            $this->parameters[] = $typehint. '$'.$parameter;

        } else {

            $this->parameters[] = $typehint. '$'.$parameter. " = $default";
        }

    }
    
    public function getBody($tab = '')
    {

        $lines = "/**\n";
        $lines .= " * Function " . $this->name . "\n";
        $lines .= " */\n"; 
        $lines .= "function ".$this->name."(" . implode(', ',$this->parameters) . ")\n";
        $lines .= "$tab{\n\n";
        $lines .= "$tab". $this->inner;
        $lines .= "$tab}\n"; 
        
        return $lines; 
    }
}