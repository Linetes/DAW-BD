<?php
$pattern=strtolower($_GET['pattern']);
$words=array("Distributed applications","AJAX","Java Server Pages", "Web services","Data bases","JavaScript","Networking","PHP","lalo","cesar","hockey","buenfil");
$response="";
$size=0;
for($i=0; $i<count($words); $i++)
{
    $pos=stripos(strtolower($words[$i]),$pattern);
    if(!($pos===false))
    {
        $size++;
        $word=$words[$i];
        $response.="<option value=\"$word\">$word</option>";
    }
}
if($size>0)
    echo "<select class=\"custom-select\" id=\"list\" size=$size onclick=\"selectValue()\">$response</select>";
?>
