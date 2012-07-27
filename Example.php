<?php

include 'Metacritic/MetacriticApi.php';

$search = new MetacriticApi();


$result1 = $search->metascore("game", "fear 3", "xbox 360"); //game is the default type

echo $result1; //Returns "75", which is correct

$result2 = $search->metascore("movie", "the dark knight rises");

echo $result2;

$result3 = $search->metascore("music", "Come Around Sundown", "Kings of Leon"); //this is a bit weird for now (I should switch these)

echo $result3;

$result4 = $search->metascore("tv", "Prison Break"); //this is a bit weird for now (I should switch these)

echo $result4;