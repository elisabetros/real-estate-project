<?php


$sActive= 'properties';
$sPageTitle = 'Properties';
require_once(__DIR__.'/components/top.php');


?>


<div id="mapProperties">
        
        <div id='map'></div>

        <div id="properties">
            <h1>Properties for sale in Copenhagen</h1>
<?php  
    $sjProperties = file_get_contents('data/properties.json');
    $jProperties = json_decode($sjProperties);
    // echo json_encode($jProperties);//->properties->P1->name;
    foreach($jProperties as $jProperty){
        // echo $sPropertId;
        echo '
        <div class="property" id="v-'.$jProperty->id.'">
        <img src="'.$jProperty->image.'" alt="">
        <h3 class="price">'.$jProperty->price.' kr.</h3>
        <p class="address">'.$jProperty->address.', '.$jProperty->zip.' </p>
        <svg class="heart" viewBox="0 0 32 29.6">
  <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
	c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
</svg> 
        </div>';
        
    }
?>

        </div>
    </div>
    <script src="js/map.js"></script>
    <script src="js/app.js"></script>
  
</body>