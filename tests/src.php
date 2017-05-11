<?php

require '../src/Code.php';
require '../src/PhpClass.php';
require '../src/PhpFile.php';
require '../src/PhpFunction.php';
require '../src/PhpMethod.php';

use Blacktools\Metabot\Base\PhpFile;
use Blacktools\Metabot\Base\PhpClass;
use Blacktools\Metabot\Base\PhpMethod;
use Blacktools\Metabot\Base\PhpFunction;

/* Create a PhpFile */
$file = new PhpFile('test.php');

/* Create a PhpClass */
$class = new PhpClass("ClassTest");
/* Set extends to a class: name */
$class->setExtends('ExtendTest');
/* Set implements to a class: name */
$class->setImplements('ImplementTest');
/* Set attribute to a class: scope / name */
$class->setAttribute('private','attributeTest');
/* Set attribute to a class: scope / name */
$class->setAttribute('private static','staticAtribute');

/* Create a PhpMethod: scope / name */
$methodTest = new PhpMethod("public","methodTest");
/* Set a parameter to a method: typehint / name  */
$methodTest->setParameter(null, "foo");
/* Set a parameter to a method: typehint / name / default */
$methodTest->setParameter(null, "bar","'zoo'");
/* Set inner content to a method, using \t for tabs and \n for break lines  */
$methodTest->setInner("\t\treturn null;\n");

/* Create a static PhpMethod: scope / name */
$staticMethod = new PhpMethod("public static","staticMethod");
/* Set a parameter to a method: typehint / name / default */
$staticMethod->setParameter('int', "xoo","'hoo'");
/* Set inner content to a method, using \t for tabs and \n for break lines  */
$staticMethod->setInner("\t\treturn ".'$xoo'.";\n");

/* Add PhpMethod to a PhpClass */
$class->setMethod($methodTest);
/* Add another PhpMethod to a PhpClass */
$class->setMethod($staticMethod);

/* Create PhpFunction: name */
$function = new PhpFunction('hey');

/* Set a namespace to a PhpFile */
$file->setNamespace('Test\Namespace');
/* Set a use keyword to a PhpFile */
$file->setUse('AnotherTest\UseThis');
/* Write a PhpClass in the PhpFile */
$file->setClass($class);
/* Write a PhpFunction in the PhpFile */
$file->setFunction($function);

/* Get the code as string */
echo $file->getBody();

// Returns

// <?php 
//
// namespace Test\Namespace;
//
// use AnotherTest\UseThis;
//
///**
// * Class ClassTest
// */
// class ClassTest extends ExtendTest implements ImplementTest
// {
//
//		private $attributeTest;
//		private static $staticAtribute;
//
//		public function methodTest($foo, $bar = 'default')
//		{
//
//			return null;
//		}
//
//		public static function staticMethod(int $xoo = 'hoo')
//		{
//
//			return $xoo;
//		}
//	
// }
//
///**
// * Function hey
// */
// function hey()
// {
//
// }


