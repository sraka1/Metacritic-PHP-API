<?php

class MetacriticApi
{
  public function metascore($type = "game", $name, $platform = NULL) {

    if(!$name) {
      throw new Exception("No parameters.");
    }

    $name = self::stripUrl($name);
    if($platform)
    {
      $platform = self::stripUrl($platform);
    }

    $dom = new DomDocument();
    if($type!=("movie" || "tv"))
    {
      $dom->loadHtmlFile("http://www.metacritic.com/$type/$platform/$name/"); //replace this with Metacritics JSON search
    }
    else
    {
      $dom->loadHtmlFile("http://www.metacritic.com/$type/$name/"); //replace this with Metacritics JSON search
    }
    
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