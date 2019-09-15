// let form = document.querySelector('form');
let allInputs = document.querySelectorAll('input');
let emailInput = document.querySelector('input[data-type=email]');
const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let radioLabels = document.querySelectorAll('.radioLabel');
radioLabels.forEach(radioLabel => {
    radioLabel.addEventListener('click', function(){
        console.log('click');
        radioLabel.parentElement.querySelectorAll('label').forEach(label=>{
            label.style.display='block';
        });
        radioLabels.forEach(radioLabel=>{
            console.log(radioLabel);
            radioLabel.style.display="none";
        })

    })
});


allInputs.forEach(input => {
    input.addEventListener('input', function(){
        // if (input.parentElement.parentElement == ('form')){
            let form = input.parentElement.parentElement;
      
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