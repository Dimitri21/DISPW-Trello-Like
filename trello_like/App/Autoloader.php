<?php

namespace App;

use Core\Controller\Controller;

/**
 *Class qui permet à chercher les classes utilisées
 *Afin d'éviter les requires.
 */
class Autoloader
{

  static function register()
  {
    spl_autoload_register(array(__CLASS__,'autoload'));
  }

  static function autoload($class_name)
  {

    if(strpos($class_name,__NAMESPACE__.'\\') === 0)
    {

      $class_name = str_replace(__NAMESPACE__.'\\','',$class_name);
      $class_name = str_replace('\\','/',$class_name);

      $file_name = __DIR__.'/'.$class_name.'.php';

        /**
         * Verification de l'existance de la classe en renvoyer
         */
      if(file_exists ( $file_name))
        require __DIR__.'/'.$class_name.'.php';
      else
      {
          header('HTTP/1.0 404 Not Found');
          die("Class not Found, bien  essayé!");
      }
    }
  }


}


?>
