<?
$res = $news->getNews();
echo "<p>Всего последних новостей: ". count($res)."<br>";
foreach($res as $v){
    $id = $v['id'];
    $title = $v['title'];
    $cat = $v['category'];
    $des = nl2br($v['description']);
    $dt = date('d-m-Y H:i:s', $v['datetime']);
    
    echo <<<LABEL
    <hr>
    <h3>$title</h3>
    <p>        $des<br>[$cat] @ $dt    </p>
    <p align="rigth">
    <a href='news.php?del=$id'>Удалить</a>
    </p>
LABEL;
}
?>