<?php

namespace Blacktools\Metabot\Base;

use Blacktools\Metabot\Base\Code;

class PhpMethod extends Code
{
    private $privacity;
    private $parameters;
    
    public function __construct($privacity, $name)
    {   
        parent::__construct($name);
        $this->privacity = $privacity;
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
        $lines = $this->privacity." function ".$this->name."(" . implode(', ',$this->parameters) . ")\n";
        $lines .= "$tab\t{\n\n";
        $lines .= "$tab". $this->inner;
        $lines .= "$tab\t}\n\n"; 
        
        return $lines; 
    }
}
