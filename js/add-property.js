const frmAddProperty = document.querySelector('.hiddenForm')
const btnCloseFrm = document.querySelector('.btnCloseFrm');
document.querySelector('#btnShowFrm').addEventListener('click', function(){
    console.log('bla');
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


//  function grabFormData(){
   
//     return formData;
// }

btnAddProperty.addEventListener('click', function(){
    event.preventDefault();
    let address  = document.querySelector('input[name=address]').value
    let zip = document.querySelector('input[name=zip]').value
    let image = document.querySelector('input[name=image]').files
    let price = document.querySelector('input[name=price]').value
console.log(image[0]);
    // let formData = {
    //     "address":address,
    //     "image": image[0],
    //     "price":price,
    //     "zip" :zip
    // }
    let formData = new FormData();
    formData.append('address', address);
    formData.append('price', price);
    formData.append('zip', zip);
    formData.append('image', image[0]);
    console.log(formData);  

    $.ajax({
        "url":"data/properties.json",
        "method": "POST",
        "data": {
                "address":address,
                "image": image[0],
                "price":price,
                "zip" :zip
            },
        "dataType":"JSON"

    }).done(function(data){
           console.log(data);
    
    }).fail(function(){
        console.log('request failed');
    })
    
});




