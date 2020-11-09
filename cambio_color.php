<?php
function oscurecer($hexcolor,$luminosidad){
    $newColor="#";
    $hexcolor = substr($hexcolor,1);
    $hexColorArray=str_split($hexcolor);
    if(count($hexColorArray)<6){
        $hexcolor = $hexColorArray[0].$hexColorArray[0].$hexColorArray[1].$hexColorArray[1].$hexColorArray[2].$hexColorArray[2];
    }
    for($i=0;$i<6;$i++){        
        $numero=hexdec($hexColorArray[$i]);
        $numero=round($numero*$luminosidad, 0,PHP_ROUND_HALF_UP);
       if($numero>16) {
           $numero=15;
       }
        $newColor=$newColor.dechex($numero);
    }

    return $newColor;
}
?>