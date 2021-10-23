<?php
echo "salut<br>";
function foo($n)
{
    if ($n===0) { return 1; }
    return $n*foo($n-1);
}
echo foo($_GET["nb"]);
?>