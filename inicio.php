<?php 
    include('header_template.php');
    $page_link ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    $feed = "https://rss.castbox.fm/everest/c5f5b70a60664f15b79bbe1127cb5acb.xml";


    if($xml = simplexml_load_file($feed)){
      $xml->registerXPathNamespace('itunes', 'http://www.w3.org/2005/Atom');
      $xml->registerXPathNamespace("im", "http://itunes.apple.com/rss");
      $xml->registerXPathNamespace('castbox', 'http://www.w3.org/2005/Atom');

        $termo = isset($_GET['episodio']) ? strtolower($_GET['episodio']) : '';
        $entries =  $xml->xpath("//item//*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]/parent::*")[0];
        $duration =  $xml->xpath("//itunes:duration[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]")[0];
        $description =  $xml->xpath("//itunes:summary[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]")[0];
        $thumbnail = $xml->xpath("//itunes:image[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]/@href");
        if (isset($_GET['episodio'])){
            $thumbnail = $thumbnail[0];
            $offset=0;
        }else{
            $thumbnail = $thumbnail[1];
            $offset=1; 
            $last_bit = explode('/',$_SERVER['REQUEST_URI']); 
             if(end($last_bit)==''){
               $page_link .='inicio';
            }
            $page_link .= '?episodio='.rawurlencode($entries->title);
        }



        $id =  $xml->xpath("//castbox:tid[preceding-sibling::*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '$termo')]]")[0];

        $all_entries = array();
        $durations = array();
        $all_entries = array_merge($all_entries, $xml->xpath("//item//*[contains(translate(text(), 'ABCDEFGHJIKLMNOPQRSTUVWXYZ', 'abcdefghjiklmnopqrstuvwxyz'), '')]/parent::*"));
        $durations = array_merge($durations, $xml->xpath("//itunes:duration"));


        $all_entries = array_slice($all_entries, $offset, 3);
        $durations = array_slice($durations, $offset, 3);

        function get_participantes($participantes){

            $participantes = strip_tags($participantes);
            $participantes = explode("Site",explode('PARTICIPANTES:',$participantes)[1]);
            $participantes = preg_replace('/(?<!^)([A-Z])/', ' \\1',$participantes )[0];
            $participantes = str_replace("-",",",$participantes);
            $pos = strpos($participantes,",");
            if ($pos !== false) {
                $participantes = substr_replace($participantes, null, $pos, strlen(","));
            }

            return $participantes;

        }


        function get_duration($duration){
            
            $duration = strtotime($duration);
            $duration = substr(date('H\Hi\M', $duration),1);
            
            if($duration[0]=="0"){
                    $duration=explode("H",$duration)[1];
                
            }
            
            
            return $duration;
        }
                

    }else{
        echo "Internal Server error";
    }
        
    include('inicio_template.php');
    include('footer_template.php');
    
?>