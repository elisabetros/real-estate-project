let queryString = window.location.href.split('?');
// console.log(queryString[1])
if(queryString){
    if(queryString[1].length==8){
        let zip = queryString[1].substring(4)
        displayByZip(zip)
        }
}

function displayByZip(zip){
    console.log(zip)
    let allProperties = document.querySelectorAll('.property');
    allProperties.forEach(property=>{
        let zipEl = property.querySelector('.zip')
        // console.log(zipEl)
        if(zipEl.innerText == zip){
            // console.log(zipEl.textContent)
            property.style.display='block';
            console.log('match')
        }else{
            property.style.display='none';

        }
    })
}


let propertyElements = document.querySelectorAll('.property');
propertyElements.forEach(propertyElement =>{
    propertyElement.addEventListener('click', function(){
        // console.log(event.target.parentElement.id);
        propertyId = event.target.parentElement.id
        addActiveClassToProperty(propertyId.substring(2));
    })
})



function removeActiveClassFromProperty(){
document.querySelectorAll('.activeProperty').forEach(activeElement => {
    activeElement.classList.remove('activeProperty');
});
}

function addActiveClassToProperty(id){
    removeActiveClassFromProperty();
    document.querySelector("#v-"+id).classList.toggle('activeProperty'); 
    document.querySelector("#m-"+id).classList.toggle('activeProperty'); 
    
}


let btnLikeProperty = document.querySelectorAll("svg");
btnLikeProperty.forEach(btn => {
    btn.addEventListener('click', function(){
        propertyId = event.target.parentElement.parentElement.id
        propertyId = propertyId.substring(2);
        console.log(propertyId);
        if(btn.className.baseVal == "heart likedByUser"){
            unlikeProperty(propertyId);
            return;
        }
        // console.log(btn.className.baseVal);
        // event.preventDefault();
        btn.className.baseVal="heart likedByUser";
        // btn.style.opacity='1';
        // btn.style.transform='scale(1.1)';
        console.log(propertyId)
        fetch("api/api-user-like-property.php?id=" + propertyId)
        .then(function(response) {
          return response.json();
        })
        .then(function(response) {
          console.log(response );
        });
    })
});

function unlikeProperty(propertyId){
    console.log('i will unlike');
    fetch("api/api-user-unlike-property.php?id=" + propertyId)
        .then(function(response) {
          return response.json();
        })
        .then(function(response) {
          console.log(response );
          document.querySelector('#v-'+propertyId).querySelector('svg').className.baseVal="heart";
        });
}