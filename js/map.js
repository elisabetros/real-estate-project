


mapboxgl.accessToken = 'pk.eyJ1IjoiZWxiZXJvIiwiYSI6ImNrMGM1Z2k0aTB5Nnkzam51Y3Bpd3d2NnMifQ.7oIhNlqkyAmk1g2qdVOglw';
var map = new mapboxgl.Map({
container: 'map',
center: [12.537515, 55.705493], // starting position, latitude, longitute
zoom: 10, // starting zoom
style: 'mapbox://styles/elbero/ck0c624q03wcg1crp33fo2rzk'
});

map.addControl(new mapboxgl.NavigationControl());

fetch("data/properties.json")
        .then(res => res.json())
        .then(jProperties => {
        // console.log(jProperties);
        jProperties.forEach(jProperty=>{
            // console.log(jProperty);   
            let el = document.createElement('a');
            el.setAttribute('href', '#v-'+ jProperty.id);
            el.className = 'marker'
            el.id = "m-"+jProperty.id;
            new mapboxgl.Marker(el).setLngLat(jProperty.marker.geometry.coordinates).addTo(map);   
            el.addEventListener('click', function(){
                addActiveClassToProperty(event.target.id.substring(2));
            }) 
        })
})

