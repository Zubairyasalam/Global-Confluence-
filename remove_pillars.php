<?php

$filePath = 'c:\\scrach\\biomed-app\\resources\\views\\sections\\about.blade.php';
$lines = file($filePath);
$newLines = array_slice($lines, 0, 163); // Keep up to line 163

file_put_contents($filePath, implode('', $newLines));
echo "Successfully removed from line 164 onwards.\n";
