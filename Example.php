<?php

$search = new \Metacritic\Metacritic_API();

$result = $search->metascore("fear 3","xbox 360");


echo $result; //Returns "75", which is correct