<?php
require_once dirname(__FILE__).'/lib/limonade.php';

function configure()
{
  option('env', ENV_DEVELOPMENT);
}

function before()
{
  layout('html_my_layout');
}

dispatch('/', 'hello_world');
  function hello_world()
  {
    return "Hello world!";
  }

function after($output)
{
  $time = number_format( (float)substr(microtime(), 0, 10) - LIM_START_MICROTIME, 6);
  $output .= "<!-- page rendered in $time sec., on ".date(DATE_RFC822)."-->";
  return $output;
}


run();

# HTML Layouts and templates

#WHEEEEEEEE

function html_my_layout($vars){ extract($vars);?> 
<html>
<head>
	<title>Limonde first example</title>
</head>
<body>
  <h1>Limonde first example</h1>
	<?=$content?>
	<hr>
	<a href="<?=url_for('/')?>">Home</a> |
	<a href="<?=url_for('/hello/', $name)?>">Hello</a> | 
	<a href="<?=url_for('/welcome/', $name)?>">Welcome !</a> | 
	<a href="<?=url_for('/are_you_ok/', $name)?>">Are you ok ?</a> | 
	<a href="<?=url_for('/how_are_you/', $name)?>">How are you ?</a>
</body>
</html>
<?}

function html_welcome($vars){ extract($vars);?> 
<h3>Hello <?=$name?>!</h3>
<p><a href="<?=url_for('/how_are_you/', $name)?>">How are you <?=$name?>?</a></p>
<hr>
<p><a href="<?=url_for('/images/soda_glass.jpg')?>">
   <img src="<?=url_for('/soda_glass.jpg/thumb')?>"></a></p>
<?}



?>
