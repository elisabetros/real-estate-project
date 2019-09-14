

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
        // event.preventDefault();
        propertyId = event.target.parentElement.parentElement.id
        propertyId = propertyId.substring(2);
        console.log(propertyId)
        fetch("api/api-user-like-property.php?id=" + propertyId)
        .then(function(response) {
          return response.json();
        })
        .then(function(response) {
          console.log({ response });
        });
    })
});

