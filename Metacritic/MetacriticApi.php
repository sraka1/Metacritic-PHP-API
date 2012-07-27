<?php

class MetacriticApi
{
  public function metascore($name, $platform) {

    if(!$name || !$platform) {
      throw new Exception("No parameters.");
    }

    $name = self::stripUrl($name);
    $platform = self::stripUrl($platform);

    $dom = new DomDocument();
    @$dom->loadHtmlFile("http://www.metacritic.com/game/$platform/$name/");

    $xpath = new DOMXpath($dom);
    $nodes = $xpath->evaluate("//span[@property='v:average']");

    if($nodes) {
      return $nodes->item(0)->nodeValue;
    } else {
      throw new Exception("Could not find Metascore.");
    }

  }


  private static function stripUrl($name) {
      $name = strtolower($name);
      $ents = array(":","'","/","\/","#","$","@",";","?",",","%","!","^","*","(",")","+","=","|","{","}","[","]",".","<",">"," ");
      $name = str_replace($ents, '-', $name);
      return $name;
    }
}

?>