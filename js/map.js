


mapboxgl.accessToken = 'pk.eyJ1IjoiZWxiZXJvIiwiYSI6ImNrMGM1Z2k0aTB5Nnkzam51Y3Bpd3d2NnMifQ.7oIhNlqkyAmk1g2qdVOglw';
var map = new mapboxgl.Map({
container: 'map',
center: [12.537515, 55.705493], // starting position, latitude, longitute
zoom: 9, // starting zoom
style: 'mapbox://styles/elbero/ck0c624q03wcg1crp33fo2rzk'
});

map.addControl(new mapboxgl.NavigationControl());


$.ajax({
    "url":"data/properties.json",
    dataType:"JSON"
}).done(function(jProperties){
    //    console.log(aProperties);
  jProperties.forEach(jProperty=>{
      console.log(jProperty);   
      let el = document.createElement('a');
      el.setAttribute('href', '#v-'+ jProperty.id);
      el.className = 'marker'
      el.id = "m-"+jProperty.id;
      new mapboxgl.Marker(el).setLngLat(jProperty.marker.geometry.coordinates).addTo(map);   
      el.addEventListener('click', function(){
          addActiveClassToProperty(event.target.id.substring(2));
      }) 
  })
    // $.each( function (propertyInfo){
    //     // console.log(propertyKey, property)
    //     let el = document.createElement('div');
    //     el.className = 'marker'
    //     el.id ="m-"+ propertyInfo.id;
    //     new mapboxgl.Marker(el).setLngLat(propertyInfo.marker.geometry.coordinates).addTo(map);   
    //     el.addEventListener('click', function(){
    //         addActiveClassToProperty(event.target.id);
    //     })   
    // });
}).fail(function(){
    console.log('request failed');
})

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
        propertyId = event.target.parentElement.id
        likeProperty(propertyId.substring(2))
    })
});

function likeProperty(id){


    $.ajax({
        url:"api/api-user-like-property.php",
        method:"POST",
        data:{'propertyId': id}
    }).done(function(response){
        console.log(response)
    }).fail(function(){
        console.log('failed');
    })
}