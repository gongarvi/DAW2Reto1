<?php



// $hexcolor='#0f0';
// $hexcolor=oscurecer($hexcolor);

echo "<p style='color:$hexcolor;'>Hola jijijijijij</p>";
function oscurecer($hexcolor,$luminosidad){
    $newColor="#";
    $hexcolor = substr($hexcolor,1);
    if($hexcolor<6){
        $hexcolor = $hexcolor[0].$hexcolor[0].$hexcolor[1].$hexcolor[1].$hexcolor[2].$hexcolor[2];
    }
    for($i=0;$i<6;$i++){
        $numero=hexdec($hexcolor[$i]);
        $numero=round($numero*$luminosidad, 0,PHP_ROUND_HALF_UP);
       if($numero>255) {
           $numero=255;
       }
        $newColor=$newColor.dechex($numero);
    }
    return $newColor;
}


?>