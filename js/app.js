let form = document.querySelector('form');
let allInputs = document.querySelectorAll('input');    

allInputs.forEach(input => {
    input.addEventListener('input', function(){
        // console.log(form.checkValidity());
        if(form.checkValidity()){
            form.querySelector('button').removeAttribute('disabled');
        }else{
            form.querySelector('button').setAttribute('disabled', true);
        }
    })
});
console.log( form, allInputs)