<?php

function get_params($key)
{
    return $_POST[$key] ?? $_GET[$key] ?? $_SERVER[$key] ?? null;
}