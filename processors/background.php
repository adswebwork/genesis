<?php

function json() { return "header('Content-Type: application/json');";}
json();

$x = rand(1,9);

print '{"url":"home_banner'.$x.'.jpg"}';


