## About

PhpMetaBot is a very minimal framework that makes easy to write "php code from php code". It can be a lot useful to make CLI commands that generate scaffold codes from different needs. Let your creativity fly. Feel free to fork and do whatever you want.

## Install

Via Composer

```bash
$ composer require blacktools/metabot
```

## Usage

```php

/* or require 'vendor/autoload.php' */
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

```

## Security

If you discover any security related issues, please email hriqueft@gmail.com instead of using the issue tracker.

## Credits

- [Henrique Fernandez Teixeira][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/henriquefernandez
[link-contributors]: ../../contributors
