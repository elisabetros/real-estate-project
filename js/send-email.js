const btnSendEmail = document.querySelector('#btnSendEmail');
const sendEmailUrl ="api/api-send-email.php";

btnSendEmail.addEventListener('click', function(){
    event.preventDefault();
    let emailSubject = document.querySelector('[name=emailSubject]').value
    let emailBody = document.querySelector('[name=emailBody]').value
    // console.log('submit');
    let formData = new FormData();
    formData.append('emailSubject', emailSubject);
    formData.append('emailBody', emailBody);

    fetch(sendEmailUrl, {
        method: "POST",
        body: formData
        })
        .then(res => res.json())
        .then(response => {
        console.log(response.status);
        if(response.status){
            displayNotification('Success!', 'Your message has been sent, we will contact you shortly.')
        }
        else{
            displayErrorMessage(response);
        }
         });
    
})

function displayErrorMessage(response){
    console.log(response);
    // if(response.message =="no user signed in"){
        document.querySelector('.error').classList.remove('hidden');
    // }
}