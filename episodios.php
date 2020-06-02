<?php include('header_template.php')?>
<?php

    $feed = "https://rss.castbox.fm/everest/c5f5b70a60664f15b79bbe1127cb5acb.xml";
    $limit = isset($_GET['limite']) ? strtolower($_GET['limite']) : 6;
    $offset = isset($_GET['inicio']) ? strtolower($_GET['inicio']) : 0;

    if($xml = simplexml_load_file($feed)){
      $xml->registerXPathNamespace('itunes', 'http://www.w3.org/2005/Atom');
      $xml->registerXPathNamespace("im", "http://itunes.apple.com/rss");

        $entries = array();
        $durations = array();
        $thumbnails = array();

        if(isset($_GET['pesquisa'])){
           $termo = strtolower($_GET['pesquisa']);
           $thumb_offset = $offset;
        }else{
           $termo = '';
           $thumb_offset = $offset+1;
        }

        $entries = array_merge($entries, $xml->xpath("//item//*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]/parent::*"));
        $durations =  $xml->xpath("//itunes:duration[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]");
        $thumbnails = $xml->xpath("//itunes:image[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]/@href");

        $entries = array_slice($entries, $offset, $limit);
        $durations = array_slice($durations, $offset, $limit);
        $thumbnails = array_slice($thumbnails, $thumb_offset, $limit);
        
        function get_duration($duration){
          
          $duration = strtotime($duration);
          $duration = substr(date('H\Hi\M', $duration),1);
          
          if($duration[0]=="0"){
                  $duration=explode("H",$duration)[1];
              
          }
          
          
          return $duration;
      }

    }else{
        echo "Internal Server Error";
    }
        
    include('episodios_template.php');
    include('footer_template.php');      

?>