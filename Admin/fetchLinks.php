<?php
        include('simple_html_dom.php');
        function getAll($url)
        {
            
            $html = file_get_html($url);
            $links=array();
            foreach($html->find("a") as $link)
            {
                if(!stripos($link->href,"#"))
                {
                    if(stripos($link->href,"//"))
                        array_push($links, $link->href);
                    else
                        array_push($links, $url."/".$link->href);
                }
            }
            return $links;
        }

        if(isset($_POST["url"]))
        {
            $url = $_POST["url"];
            $html = file_get_html($url);
            foreach($html->find('body') as $d)
                echo $d;
        }

?>