<?php
// echo $sUserType;
$sActive= 'profile';
$sPageTitle = 'profile';
require_once(__DIR__.'/components/top.php');
if(!$_SESSION){
    header('location:index.php');
} 
$sUserType = $_SESSION['user']->userType;

$sUserId = $_SESSION['user']->id;
$sjProperties = file_get_contents('data/properties.json');
$jProperties = json_decode($sjProperties);
?>  
<div class="profileContainer" id=<?= '"'.$sUserType .'"'?>>
    <h1>Welcome <?= $_SESSION['user']->name ?></h1>

    <div class="buttonContainer">
        <a class="btnLogout" href="logout.php">LOGOUT</a>
    <button class="btnDeleteProfile">Delete Profile</button>
    </div>

    <div class="profileInformation">
        <h2>Your information</h2>
        <button class='editInfo'>Change</button>
        <?php
    echo "
    <form method='Post'>
      <input type='text' maxlength='20' minlength='2' name='newName' class='noValidate' value='{$_SESSION['user']->name}'>
    <input type='text' name='newEmail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$' data-type='email' class='noValidate' value='{$_SESSION['user']->email}'>
    <button class='hidden btnSaveInfo'>Save</button>
    </form>
    ";
    ?>
        <!-- <button id="btnDeleteProfile">Update Information</button> -->
        
    </div>
    <div id="likedProperties">
        <h2>Your Liked Properties</h2>
<?php
// echo $sjProperties;

    foreach($jProperties as $jProperty){
        if(in_array($sUserId, $jProperty->userLikes)){
            echo '
            <div class="likedProperty">
            <img src="'.$jProperty->image.'" alt="">
            <h3 class="propertyPrice">'.$jProperty->price.' kr.</h3>
            <p class="propertyAddress">'.$jProperty->address.', '.$jProperty->zip.'</p>
            </div>
            ';
        }     
    }
    
?>

    </div>

    <div id ="agentForm">
    <button id="btnShowFrm">Add Property</button>
    <form action="agent-create-property.php" class="hiddenForm" id="frmNewProperty" method="POST" enctype="multipart/form-data">
        <span class="btnCloseFrm">X</span>
        <label>Image<input type="file" name="image" required >
        <div class="requirements">Image must be included</div></label>
        <label>Address
            <input type="text" value="Emdrupvej 100" placeholder="Mulholland dr." name="address" data-min="5" data-max="30" minlength="5"maxlength="30" required>
            <div class="requirements">Address must be mininum 5 characters</div>
        </label>
        <label>Zip code
            <input type="number" value="2100" placeholder="2100" name="zip" max="9999" min="1000" data-min="4" data-max="4" required>
            <div class="requirements">Zip code must be 4 numbers</div>
        </label>
        <label>Price in kr.
            <input type="text" value="5000" placeholder="100.000.000" name="price" data-min="1" data-max="999999999999" minlength="1"maxlength="999999999999" required>
            <div class="requirements">Price must be between 1 and 999999999999 kr.</div>
        </label>
        <button id="btnAddProperty" disabled>Add Property</button>
    </form>
</div>

<div id="agentProperties">
<h2>Your Properties</h2>
    <?php
    
    foreach($jProperties as $jProperty){
        // echo $jProperty->agent;
        if($sUserId == $jProperty->agent){
            echo '
            <div class="agentProperty" id="'.$jProperty->id.'">
            <img src="'.$jProperty->image.'" alt="">
            <h3 class="propertyPrice">'.$jProperty->price.' kr.</h3>
            <p class="propertyAddress">'.$jProperty->address.', '.$jProperty->zip.'</p>
            <a href="delete-property.php?id='.$jProperty->id.'" class="btnDeleteProperty">Delete Property</a>
        </div>
            ';
        }
    }
    ?>
</div>
    


   

    
</div>


<div class="modal">
    <div class="modalContent">
        <h1>Are You sure you want to delete your profile?</h1>
        <div>
        <a href="delete-profile.php" class="continueDelete">Yes</a>
        <a class="backToProfile">No</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/profile.js"></script>
<script src="js/validate.js"></script>
</body>
</html>