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