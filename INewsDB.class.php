<?php
Interface INewsDB{
    
    function saveNews($t, $c, $d, $s);
    function getNews();
    function deleteNews($id);
}



?>
