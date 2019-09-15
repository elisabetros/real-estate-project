//MENU
let menuOpen = false;
const menuIcon = document.querySelector(".menuIcon");
const menu = document.querySelector(".menu");
const bars = menuIcon.querySelectorAll("rect");
let menuLinks = document.querySelectorAll(".menu>nav>a");
const header = document.querySelector("header");
// let dropdown = document.querySelector(".dropdown-content");
menuIcon.addEventListener("click", () => {
  // console.log("menu clicked")
  toggleMenu();
});
menuLinks.forEach(link => {
  link.addEventListener("click", () => {
    toggleMenu;
  });
});
// Link clicked menu closed

let toggleMenu = () => {
  // console.log("oopen");
  menuOpen = !menuOpen;
  bars[0].classList.toggle("rotateDown");
  bars[1].classList.toggle("fadeOut");
  bars[2].classList.toggle("rotateUp");
  menu.classList.toggle("hiddenMenu");
};

//MENU ends


let queryString = window.location.href.split('?');
// console.log(queryString[1])
if(queryString[1]){
    if(queryString[1].length==8){
        let zip = queryString[1].substring(4)
        displayByZip(zip)
        }
}

function displayByZip(zip){
    let btnShowAll = document.createElement('button');
    btnShowAll.textContent="Show all properties";
    document.querySelector('#properties').prepend(btnShowAll);
    btnShowAll.addEventListener('click', )
    console.log(zip)
    let allProperties = document.querySelectorAll('.property');
    allProperties.forEach(property=>{
        let zipEl = property.querySelector('.zip')
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


let btnLikeProperty = document.querySelectorAll(".heart");
btnLikeProperty.forEach(btn => {
    btn.addEventListener('click', function(){
        propertyId = event.target.parentElement.parentElement.id
        propertyId = propertyId.substring(2);
        console.log(propertyId);
        if(btn.className.baseVal == "heart likedByUser"){
            unlikeProperty(propertyId);
            return;
        }
        
        console.log(propertyId)
        fetch("api/api-user-like-property.php?id=" + propertyId)
        .then(function(response) {
          return response.json();
        })
        .then(function(response) {
          if(response.status==0){
              displayNotification('Sorry!','You must be logged in to like a property')
          }else{
            btn.className.baseVal="heart likedByUser";
          }
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



function displayNotification(header, message){
    let modalContainer = document.createElement('div');
    modalContainer.className = 'modal notificationModal';
    let spanClose = document.createElement('span');
    spanClose.className='closeModal';
    spanClose.textContent = 'X';
    let modalDiv = document.createElement('div');
    modalDiv.className= 'modalContent';
    let h1 = document.createElement('h1')
    h1.textContent = header
    let p = document.createElement('p')
    p.textContent = message;
    document.querySelector('body').append(modalContainer);
    modalContainer.append(modalDiv);
    modalDiv.append(spanClose,h1,p);
    modalContainer.style.display="block";
    spanClose.addEventListener('click', function(){
        modalContainer.style.display="none";
    })
}
