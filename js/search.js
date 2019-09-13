// function checkSearch(){
//     console.log('checking search');
//     if(searchInput.value.length < 2){
//         searchInput.classList.add('error');
//         console.log('its empty')
//     }
    
// }
const searchInput = document.querySelector('.searchBar');
const divResults = document.querySelector('#searchResults');
const searchUrl = 'api/api-search.php';
searchInput.addEventListener('input', function(){
    console.log('searching')
    if(searchInput.value.length == 0){
        searchInput.classList.remove('error');
        divResults.style.display = 'none'; 
        return;
    }
    // let
    let formData = new FormData();
    formData.append('search', searchInput.value);

    fetch(searchUrl, {
        method: "POST",
        body: formData
        })
            .then(res => res.json())
            .then(matches => {
            console.log(matches);
                // $('#searchResults').empty()
                divResults.innerHTML = "";
                matches.forEach(match => {
                   match = match.replace(/</g, '&lt;');
                   match = match.replace(/>/g, '&gt;');      
                    // console.log(match);
                    let zipLink = document.createElement('a');
                    zipLink.className='searchLink';
                    zipLink.textContent = match;
                    zipLink.href="search.php?zip="+ match;
                    divResults.append(zipLink);         // let div = "<div>${match}</div>" in jquery
                });      

            });

    if(searchInput.value.length == 0){
      
    }else{
        divResults.style.display = 'block'; 
    }
})