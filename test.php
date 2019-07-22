<?php

$user_id = '12';

if (!file_exists('upload')) {
    mkdir('upload', 0777, true);
    mkdir('upload/'.$user_id, 0777, true);
}
?>