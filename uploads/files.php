<?
$home  = $_SERVER['DOCUMENT_ROOT'];
$dir = $home . "/energy/uploads/";
$array = scandir($dir);

for ($i=0; $i < count($array); $i++) {
	echo '<a href="' . $dir . $array[$i] . '" download>' . $array[$i] . "</a> <hr>";
}

echo $dir;

 ?> 