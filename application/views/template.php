<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($header))
{
    echo (isset($header)?$header:'');
}

if (isset($sidebar))
{
    echo (isset($sidebar)?$sidebar:'');
}

if (isset($content))
{
    echo (isset($content)?$content:'');
}

if (isset($footer))
{
     echo (isset($footer)?$footer:'');
}
