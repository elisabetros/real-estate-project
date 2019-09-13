const frmAddProperty = document.querySelector('.hiddenForm')
const btnCloseFrm = document.querySelector('.btnCloseFrm');
document.querySelector('#btnShowFrm').addEventListener('click', function(){
    // console.log('bla');
    frmAddProperty.style.display = 'grid';
    document.querySelector('#btnShowFrm').style.display="none";
    btnCloseFrm.addEventListener('click', function(){
        frmAddProperty.style.display = 'none';
        document.querySelector('#btnShowFrm').style.display="block";
    })
    
})
const url = "api/api-create-property.php";
const btnAddProperty = document.querySelector('#btnAddProperty');
const formToUpload = document.querySelector("#frmNewProperty");



btnAddProperty.addEventListener('click', function(){
    event.preventDefault();
    let address  = document.querySelector('input[name=address]').value
    let zip = document.querySelector('input[name=zip]').value
    let image = document.querySelector('input[name=image]').files[0]
    let price = document.querySelector('input[name=price]').value
console.log(image[0]);
   
    let formData = new FormData();
    formData.append('address', address);
    formData.append('price', price);
    formData.append('zip', zip);
    formData.append('image', image);
    // console.log(formData);  




    fetch(url, {
        method: "post",
        body: JSON.stringify(formData),
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json"
        }
      })
        .then(res => res.json())
        .then(d => {
          console.log(d);
                
        });
    
});




