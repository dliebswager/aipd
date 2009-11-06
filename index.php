<?php
require_once ('lib/limonade.php');

function configure()
{
  $localhost = preg_match('/^localhost(\:\d+)?/', $_SERVER['HTTP_HOST']);
  $env =  $localhost ? ENV_DEVELOPMENT : ENV_PRODUCTION;
  option('env', $env);
}

function before()
{
  layout('layout.html.php');
}

dispatch('/', 'home');
  function home()
  {
    return html('index.html.php');
  }

function after($output)
{
  $time = number_format( (float)substr(microtime(), 0, 10) - LIM_START_MICROTIME, 6);
  $output .= "<!-- page rendered in $time sec., on ".date(DATE_RFC822)."-->";
  return $output;
}


run();