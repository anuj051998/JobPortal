<?php 
include('simple_html_dom.php');
$html = file_get_html('https://www.emitra.net/');


$govtJobs = array();
$Otherjobs = array();
$others = array();
foreach($html->find('a.menu-link') as $article) 
{
    if(stripos($article,"Govt Jobs"))
        array_push($govtJobs, $article);
    else
        if(stripos($article,"Jobs"))
            array_push($Otherjobs, $article);
        else
        {
            if(stripos($article, "Admit") || stripos($article, "Result"))
                array_push($others, $article);
        }
}

$navBarlinks = array();

foreach($html->find("ul") as $article)
{
    foreach($article->find("li") as $menuLink)
    {
        if(stripos($menuLink,"Home") || stripos($menuLink,"About Us")|| stripos($menuLink,"Contact Us") || stripos($menuLink,"Search"))
            continue;
        if(stripos($menuLink,"menu-item"))
            array_push($navBarlinks,$menuLink);
    }
}

foreach($navBarlinks as $link)
{
    echo $link."<br>////////////////////////////";
}
?>