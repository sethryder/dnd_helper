<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Knights of the D</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Your website description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />
<link rel="stylesheet" href="http://192.168.1.10/dnd/andreas08.css" type="text/css" media="screen,projection" />
</head>

<body>
<div id="container" >

<div id="header">
<h1>Knights of the D</h1>
<h2>Protectors of the Nylon Dungeon!</h2>
</div>

<div id="navigation">
<ul>
<?php foreach($nav_list  as $id => $nav_item): ?>
	<li class="<?= ($nav == $id ? 'selected' : '')?>">
		<?= anchor($id, $nav_item) ?>
	</li>
<?php endforeach ?>
</ul>
</div>

<div id="content">
<?= $contents ?>
</div>

<div id="footer">
<p>&copy;2011 <a href="#">Knights of the D</a> | Generated in {elapsed_time} seconds.
</div>

</div>
</body>
</html>