let modal = document.querySelector('.modal');
const createPropertyUrl = "/../agent-create-property.php";

document.querySelector('.btnDeleteProfile').addEventListener('click', function(){
    openModal();
})

function openModal(){
    modal.style.display="block";
    document.querySelector('.continueDelete').addEventListener('click', function(){
        deleteProfile();
        modal.style.display="none";
        //redirect to index
    })
    document.querySelector('.backToProfile').addEventListener('click', function(){
        modal.style.display="none";
    })
}
let btnEdit = document.querySelector('.editInfo');
let btnSave = document.querySelector('.btnSaveInfo')
let inputChangeInfo = document.querySelectorAll('.inputChangeInfo')
const emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


btnEdit.addEventListener('click', function(){
    // console.log('click btn');
    inputChangeInfo[0].focus()
    btnSave.classList.remove('hidden');
    
    btnSave.addEventListener('click', saveNewInfo);
})

function saveNewInfo(){
    let updateUrl = 'api/api-update-profile.php'
    let newName = document.querySelector('[name=newName]').value;
    let newEmail = document.querySelector('[name=newEmail]').value;
    console.log(newEmail, newName);
    let formData = new FormData();
    formData.append('newName', newName);
    formData.append('newEmail', newEmail);

    fetch(updateUrl, {
        method: "POST",
        body: formData
        })
            .then(res => res.json())
            .then(user => {
            console.log(user);
            btnSave.classList.add('hidden');
            });
    }

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





// const btnAddProperty = document.querySelector('#btnAddProperty');
// const formToUpload = document.querySelector("#frmNewProperty");
// btnAddProperty.addEventListener('click', function(){
//     event.preventDefault();
//     let address  = document.querySelector('[name=address]').value
//     let zip = document.querySelector('[name=zip]').value
//     let image = document.querySelector('[type=file]').files[0]
//     let price = document.querySelector('[name=price]').value
// console.log(image);
   
//     let formData = new FormData();
//     formData.append('address', address);
//     formData.append('price', price);
//     formData.append('zip', zip);
//     formData.append('image', image);
//     console.log(formData);  

    
//     fetch(crea, {
//         method: "POST",
//         body: formData
//       })
//         .then(res => res.json())
//         .then(response => {
//           console.log(response);
//         });
//     });
    
    
    
