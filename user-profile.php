<?php
session_start();
$sActive= 'profile';
$sPageTitle = 'profile';
require_once(__DIR__.'/components/top.php');

?>
<div class="profileContainer">
    <h1>Welcome <?= $_SESSION['user']->name ?></h1>

    <a class="btnLogout" href="logout.php">LOGOUT</a>


    <div class="profileInformation">
        <h2>Your information</h2>
        <?php
    echo "
    <p> {$_SESSION['user']->name}</p>
    <p> {$_SESSION['user']->email}</p>
    ";
    ?>
        <!-- <button id="btnDeleteProfile">Update Information</button> -->
        
        <button class="btnDeleteProfile">Delete Profile</button>
    </div>
    <div id="likedProperties">
        <div class="likedProperty">
                <h2>Your Liked Properties</h2>
            <img src="" alt="">
            <p>Address</p>
            <p>Price</p>
        </div>
    </div>

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
</body>
</html>