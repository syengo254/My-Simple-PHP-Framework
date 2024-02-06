<?php
function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function base_path($cpath)
{
  return BASE_PATH . $cpath;
}

function abort($status = 404)
{
  http_response_code($status);
  require base_path("views/{$status}.view.php");
  die();
}
