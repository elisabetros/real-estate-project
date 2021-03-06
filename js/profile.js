let modal = document.querySelector('.modal');
const createPropertyUrl = "/../agent-create-property.php";
let btnEdit = document.querySelector('.editInfo');
let btnSave = document.querySelector('.btnSaveInfo')
let inputChangeInfo = document.querySelectorAll('.noValidate')
const emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

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


btnEdit.addEventListener('click', function(){
    // console.log('click btn');
    inputChangeInfo[0].focus()
    btnSave.classList.remove('hidden');
    btnSave.addEventListener('click', saveNewInfo);
})

function saveNewInfo(){
    event.preventDefault();
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
            displayNotification('Success', 'Your information has been updated')
            });
    }

const frmAddProperty = document.querySelector('#frmNewProperty')
const btnCloseFrm = document.querySelector('.btnCloseFrm');
document.querySelector('#btnShowFrm').addEventListener('click', function(){
    // console.log('bla');
    frmAddProperty.classList.add('showForm');
    document.querySelector('#btnShowFrm').style.display="none";
    btnCloseFrm.addEventListener('click', function(){
        frmAddProperty.classList.remove('showForm');
        document.querySelector('#btnShowFrm').style.display="block";
    })

})

document.addEventListener('click', function(){
    if (event.target && event.target.className == 'updateProperty'){
        console.log('save')
        console.log('click');
        let parent = event.target.parentElement;
        parent.querySelector('.noValidate').focus();
        parent.querySelector('.btnSaveInfoProp').classList.remove('hidden');
        // btnSave.classList.remove('hidden');
        parent.querySelector('.btnSaveInfoProp').addEventListener('click', function(){
            saveNewInfoProperty( );
            return;
        });
    }
    if(event.target && event.target.className=='btnDeleteProperty'){
        let id = event.target.parentElement.id
        // console.log(event.target.parentElement.id);
        let deleteUrl = 'api/api-delete-property.php?id=' +id
        fetch(deleteUrl)
                .then(res => res.text())
                .then(response => {
                console.log(response);
                document.getElementById(id).remove();
                displayNotification('Success!', 'The Property has been deleted')
                });
    }
})

// const btnsUpdateProperty = document.querySelectorAll('.updateProperty');

function saveNewInfoProperty(){
    event.preventDefault();
    let parent = event.target.parentElement.parentElement;
    let newPrice =  parent.querySelector('[name=newPrice]').value;
    newPrice = newPrice.split(' ', 1)
    let newAddress =  parent.querySelector('[name=newAddress]').value;
    let newZip =  parent.querySelector('[name=newZip]').value;
    let propertyFormData = new FormData();
    propertyFormData.append('newPrice', newPrice[0])
    propertyFormData.append('newAddress', newAddress)
    propertyFormData.append('newZip', newZip)
    propertyFormData.append('id', parent.id)
    // console.log(parent);
    let updatePropertyUrl = 'api/api-agent-update-property.php'
    fetch(updatePropertyUrl, {
        method: "POST",
        body: propertyFormData
        })
            .then(res => res.json())
            .then(user => {
            console.log(user);
            displayNotification('Success!','The property information has been updated');
            btnSave.classList.add('hidden');
            });
    parent.querySelector('.btnSaveInfoProp').classList.add('hidden');
    }


   

const btnAddProperty = document.querySelector('#btnAddProperty');
const formToUpload = document.querySelector("#frmNewProperty");
btnAddProperty.addEventListener('click', function(){
    event.preventDefault();
    let address  = document.querySelector('[name=address]').value
    let zip = document.querySelector('[name=zip]').value
    let image = document.querySelector('[type=file]').files[0]
    let price = document.querySelector('[name=price]').value
// console.log(image);
    let formData = new FormData();
    formData.append('address', address);
    formData.append('price', price);
    formData.append('zip', zip);
    formData.append('image', image);
    // let fetchResponse = fetchPostrqs(url, formData);
    // console.log(response);


    fetch("api/api-agent-create-property.php", {
        method: "POST",
        body: formData
      })
        .then(res => res.json())
        .then(response => {
          console.log(response);
          const allAgentProperties = document.querySelector("#agentProperties");
            let newPropertyDiv = document.createElement('div');
            newPropertyDiv.className = "property";
            newPropertyDiv.id = response.propertyId;
            let newImg = document.createElement('img');
            newImg.setAttribute('src', response.image)
            let newBtnUpdate = document.createElement('button');
            newBtnUpdate.className="updateProperty";
            newBtnUpdate.textContent = "Update Information";
            let newForm = document.createElement('form');
            newForm.setAttribute('method', 'POST');
            let newInputPrice = document.createElement('input')
            let newInputZip = document.createElement('input')
            let newInputAddres = document.createElement('input')
            let newBtnSave = document.createElement('button');
            newInputPrice.setAttribute('value', price);
            newInputZip.setAttribute('value', zip);
            newInputAddres.setAttribute('value', address);
            newInputPrice.setAttribute('name', 'newPrice');
            newInputZip.setAttribute('name', 'newZip');
            newInputAddres.setAttribute('name', 'newAddress');
            newInputPrice.setAttribute('type', 'text');
            newInputZip.setAttribute('type', 'text');
            newInputAddres.setAttribute('type', 'text');
            newInputAddres.className="noValidate";
            newInputZip.className="noValidate";
            newInputPrice.className="noValidate";

            newBtnSave.className="hidden btnSaveInfoProp";
            newBtnSave.textContent = "Save";
            let newBtnDelete = document.createElement('img');
            newBtnDelete.className="btnDeleteProperty";
            newBtnDelete.src='icons/delete.svg';    

            allAgentProperties.append(newPropertyDiv);
            newPropertyDiv.append(newImg, newBtnUpdate, newForm, newBtnDelete)
            newForm.append(newInputPrice, newInputZip, newInputAddres, newBtnSave);
            displayNotification('Success!','The property has been created')
            //append everything to div
            //append div to property container

            ///todo add event listeners to newly created element

        });
    });
    

    // function fetchPostrqs(url, formData){
    //     fetch(url, {
    //         method: "POST",
    //         body: formData
    //         })
    //             .then(res => res.json())
    //             .then(user => {
    //             console.log(user);
    //             });
    //     }
    
    
    