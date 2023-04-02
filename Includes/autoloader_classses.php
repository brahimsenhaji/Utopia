<?php
// register the autoloader function
spl_autoload_register('my_autoloader');

function my_autoloader($className) {
   $path = '../Classes/';
   $ex = ".class.php";
   $fullpath =  $path . $className . $ex ;

   if(!file_exists($fullpath)){
      return false;
   }
   include_once $fullpath;
}

