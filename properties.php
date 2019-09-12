<?php


$sActive= 'properties';
$sPageTitle = 'Properties';
require_once(__DIR__.'/components/top.php');


?>


<div id="mapProperties">
        
        <div id='map'></div>

        <div id="properties">
<?php  
    $sjProperties = file_get_contents('data/properties.json');
    $jProperties = json_decode($sjProperties);
    // echo json_encode($jProperties);//->properties->P1->name;
    foreach($jProperties as $jProperty){
        // echo $sPropertId;
        echo '
        <div class="property" id="v-'.$jProperty->id.'">
        <img src="'.$jProperty->image.'" alt="">
        <h4 class="address">'.$jProperty->address.'</h4>
        <p class="zip">'.$jProperty->zip.'</p>
        <p class="price">'.$jProperty->price.'</p>
        </div>';
    }
?>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/map.js"></script>
  
</body>