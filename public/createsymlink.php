<?php
    $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/../storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';

    // Check if the link already exists to prevent errors
    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        echo 'Symlink process successfully completed.';
    } else {
        echo 'Symlink already exists.';
    }
?>
