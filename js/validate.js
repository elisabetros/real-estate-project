let form = document.querySelector('form');
let allInputs = document.querySelectorAll('input');
let emailInput = form.querySelector('input[data-type=email]');
const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

allInputs.forEach(input => {
    input.addEventListener('input', function(){
        console.log(form.checkValidity());
        if(emailInput){
            // console.log('there is an email attribute')
            if(re.test(String(emailInput.value).toLowerCase())){
                emailInput.classList.remove('inputError')
                form.querySelector('button').disabled=false;
                  }else{
                emailInput.classList.add('inputError')
                form.querySelector('button').disabled = true;
            }              


       
        }
    if(form.checkValidity()){
        form.querySelector('button').disabled=false;
    }else{
        form.querySelector('button').disabled = true;
    }
    })
});