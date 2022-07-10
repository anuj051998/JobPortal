<?php 
    if (isset($_POST['page'])) {
      include('simple_html_dom.php');
    $link = $_POST['page'];
    $html = file_get_html($link);
    foreach($html->find('article') as $element){
    echo str_replace('https://allgovernmentjobs.in/', '#',$element);
  }
}
?>