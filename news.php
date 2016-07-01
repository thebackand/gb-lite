<?php
header('Content-type: text/html; charset=utf-8');

require 'NewsDB.class.php';
$news = new NewsDB();
$ErrMsg = '';
if($_SERVER['REQUEST_METHOD']==POST)
    include 'save_new.inc.php';

if($_GET['del']){
 include 'delete_news.inc.php';   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новости и SQLite 3 </title>
</head>
<body>
    
    
<h2>Последние новости</h2>    

<form action="" method="POST">    
<label>Заголовок новости</label><br>
<?
    if($ErrMsg)
        echo "<h3>$ErrMsg</h3>";
    ?>
<input type="text" name='title'>       
<br><br>
<label>Выберите категорию</label><br>
<select name="category" id="">
    <option value="Политика">Политика</option>
    <option value="Культура">Культура</option>
    <option value="Спорт">Спорт</option>
</select>      
<br><br>
   <label for="">текст новости</label><br>    
    <textarea name="description" id="" cols="50" rows="10"></textarea>
<br>
   <label for="">Источник</label><br>    
    <input type="text" name='source'>
    <br>
    <br>
<button type="submit">Добавить!</button>
        
</form>    
<?
    include 'get_news.inc.php';
    ?>
</body>
</html>