<?php

$targetFolder= $_SERVER[ 'DOCUMENT_ROOT' ].'/maanage/system/avocado/storage/app/public';
echo $targetFolder;
$linkFolder= $_SERVER['DOCUMENT_ROOT'].'/maanage/system/storage';
print($linkFolder);

symlink($targetFolder,$linkFolder);
echo 'Success';