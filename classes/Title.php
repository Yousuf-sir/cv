<?php

class Title {

/*
* propertise title
* @void string
*/
 protected $title;

/*
* construction
*/

 public function __construct ()
{
  //self::$title = $title;

}



 public function show_title()
{
  $path = $_SERVER['SCRIPT_FILENAME'];
   $this->title = basename($path,".php");
   if( $this->title == 'index') {
     return 'Home';
   }else{
     return $this->title;
   }

}

}
