<?php
$htmlCode = file_get_contents('index.html');
$pattern = '/<meta(.+)>/im';
preg_match_all($pattern, $htmlCode, $metaArray, PREG_SET_ORDER);
foreach ($metaArray as $tag) {
  echo htmlspecialchars($tag[1]) . '<br>';
}
