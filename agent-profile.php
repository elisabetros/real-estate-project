<?php
session_start();
if(!$_SESSION){
    header('location:index.php');
}
$sActive= 'profile';
$sPageTitle = 'profile';
require_once(__DIR__.'/components/top.php');





?>
<div class="profileContainer">
<h1>Welcome <?= $_SESSION['user']->name ?></h1>
<a class="btnLogout" href="logout.php"> LOGOUT</a>
<div class="profileInformation">
<?php
    echo "
    <p> {$_SESSION['user']->name}</p>
    <p> {$_SESSION['user']->email}</p>
    ";
    ?>
  
</div>
<div>
    <button id="btnShowFrm">Add Property</button>
    <form action="" class="hiddenForm" id="frmNewProperty" method="POST">
        <span class="btnCloseFrm">X</span>
        <label>Image<input type="file" name="image" required >
        <div class="requirements">Image must be included</div></label>
        <label>Address
            <input type="text" value="Emdrupvej 100" placeholder="Mulholland dr." name="txtAddress" data-min="5" data-max="30" minlength="5"maxlength="30" required>
            <div class="requirements">Address must be mininum 5 characters</div>
        </label>
        <label>Zip code
            <input type="number" value="2100" placeholder="2100" name="txtZip" max="9999" min="1000" data-min="4" data-max="4" required>
            <div class="requirements">Zip code must be 4 numbers</div>
        </label>
        <label>Price in kr.
            <input type="text" value="5000 "placeholder="100.000.000" name="txtPrice" data-min="1" data-max="999999999999" minlength="1"maxlength="999999999999" required>
            <div class="requirements">Price must be between 1 and 999999999999 kr.</div>
        </label>
        <button id="btnAddProperty" disabled>Add Property</button>
    </form>
</div>

<div id="agentProperties">
<h2>Your Properties</h2>
    <?php
    $sjProperties = file_get_contents('data/properties.json');
    $jProperties = json_decode($sjProperties);
    foreach($jProperties as $jProperty){
        // echo $jProperty->agent;
        if($_SESSION['user']->id == $jProperty->agent){
            echo '
            <div class="agentProperty" id="'.$jProperty->id.'">
            <img src="'.$jProperty->image.'" alt="">
            <p class="propertyPrice">'.$jProperty->price.'</p>
            <p class="propertyAddress">'.$jProperty->address.'</p>
            <button class="btnDeleteProperty">Delete Property</button>
        </div>
            ';
        }
    }
    ?>
</div>
<button class="btnDeleteProfile">Delete Profile</button>
</div>

<div class="modal">
    <div class="modalContent">
        <h1>Are You sure you want to delete your profile?</h1>
        <div>
        <button class="continueDelete">Yes</button>
        <button class="backtoProfile">No</button>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/delete-profile.js"></script>
<script src="js/validate.js"></script>
<script src="js/add-property.js"></script>
</body>
</html>