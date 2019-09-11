<?php
session_start();
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
        <label>Image<input type="file" required name="image"></label>
        <label>Address<input type="text" placeholder="Mulholland dr." name="txtAddress" required></label>
        <label>Zip code<input type="text" placeholder="2100" name="txtZip" required></label>
        <label>Price in kr.<input type="text" placeholder="100.000.000" name="txtPrice" data-min="1" data-max="999999999999" required</label>
        <button id="btnAddProperty" disabled>Add Property</button>
    </form>
</div>

<div id="yourProperties">
    <div class="propertyAgentProfile">
        <img src="" alt="">
        <p>property price</p>
        <p>property address</p>
        <button class="btnDeleteProperty">Delete Property</button>
    </div>
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

<script src="js/delete-profile.js"></script>
<script src="js/validate.js"></script>
<script src="js/add-property.js"></script>
</body>
</html>