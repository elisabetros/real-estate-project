
 <?php
    $sPageTitle = 'Real Estate';
    require_once(__DIR__.'/components/top.php');
    ?>
<div id="frontpage">
    <h1>Find Your New House!</h1>
    <form id="frmSearch" method="POST">
    <input name="txtSearch" type="text" class="searchBar noValidate" placeholder="Search by zip code">
    <button>Search</button>
    </form>
    <div id="searchResults"></div>
</div>
   


    <script src="js/search.js"></script>
</body>
</html>