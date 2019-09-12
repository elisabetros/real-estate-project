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
    let address  = document.querySelector('input[name="txtAddress"]').value
    let zip = document.querySelector('input[name=txtZip]').value;
    let image = document.querySelector('input[name=image]').files
    let price = document.querySelector('input[name=txtPrice]').value

    let formData = {
        "txtAddress":address,
        "image": image,
        "txtPrice":price,
        "txtZip" :zip
    }
    console.log(formData )

    $.ajax({
        url: 'api/api-create-property.php',
        method : "POST",
        data : $('.hiddenForm').serialize() 
    }).done(function(jData){
        console.log(jData);
    }).fail(function(){
        console.log('failed to fetch');
    })
});