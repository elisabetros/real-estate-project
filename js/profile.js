let modal = document.querySelector('.modal');

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
    document.querySelector('.backtoProfile').addEventListener('click', function(){
        modal.style.display="none";
    })
}
