<?php

$t = $news->clearStr($_POST['title']);
$d = $news->clearStr($_POST['description']);
$s = $news->clearStr($_POST['source']);
$c = $news->clearInt($_POST['category']);
if(empty($t) or empty($d)){
    $ErrMsg = 'Заполните обязательные поля';
}else{
    $news->saveNews($t, $c, $d, $s);
    header('Location: news.php');
}
?>