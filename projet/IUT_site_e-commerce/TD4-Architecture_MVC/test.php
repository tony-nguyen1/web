<?php
$str = 'I love "PHP".';
echo htmlspecialchars($str, ENT_QUOTES); // Converts double and single quotes

echo rawurlencode("&immat=h");
?>