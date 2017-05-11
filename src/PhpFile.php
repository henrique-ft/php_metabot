<?php

/**
*
* @author Henrique Fernandez Teixeira
*     
*/

namespace Blacktools\Metabot\Base;

class PhpFile extends Code
{
    private $_namespace;
    private $_uses;
    private $classes;
    private $functions;
    
    public function __construct($name)
    {   
        parent::__construct($name);
        
        $this->classes = [];
        $this->functions = [];
        $this->_uses = [];
    }

    public function setNamespace($namespace)
    {
        $this->_namespace = 'namespace ' . $namespace;
    }

    public function setUse($use)
    {
        $this->_uses[] = 'use ' . $use;
    }

    public function setFunction(PhpFunction $function)
    {
        $this->functions[] = $function;
    }
    
    public function setClass(PhpClass $class)
    {
        $this->classes[] = $class;  
    }
    
    public function getClasses()
    {
        return $this->classes;
    }

    public function getFunctions()
    {
        return $this->functions;
    }

    public function create($path)
    {
        if (file_exists($path.'/'.ucfirst($this->name).".php")) {
               
            return false;
            
        } else {
            
            fwrite(fopen($path.'/'.ucfirst($this->name).".php", "w"), $this->getBody());
            
            return true;
        }
    }

    public function getBody($tab = '')
    {
        $lines = "<?php \n\n";

        if (!empty($this->_namespace)) {
            
            $lines .= $this->_namespace .";\n\n";   
        }
        
        foreach ($this->_uses as $use) {
                  
            $lines .= $use .";\n";          
        }
        
        $lines .= "\n"; 
        
        foreach ($this->classes as $class) {
                  
            $lines .= $class->getBody()."\n";          
        }
        foreach ($this->functions as $function) {
                  
            $lines .= $function->getBody()."\n";          
        }
        
        $lines .= $this->inner;

        return $lines;
    }
}