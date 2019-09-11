let form = document.querySelector('form');
let allInputs = document.querySelectorAll('input');
let emailInput = form.querySelector('input[name=txtEmail]');
const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

allInputs.forEach(input => {
    input.addEventListener('input', function(){
        // console.log(emailInput)
        // console.log(form.checkValidity());
        
        if(form.checkValidity()){
            // if(re.test(String(emailInput.value).toLowerCase())){
                // TODO add error class
            form.querySelector('button').removeAttribute('disabled');
        }else{
             // TODO remove error class
            form.querySelector('button').setAttribute('disabled', true);
        }
    // }
    })
});