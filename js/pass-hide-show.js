const eyeClose=document.querySelector(".wrapper .form .field i");
const passF=document.querySelector(".wrapper .form .field input[type='password']");

eyeClose.addEventListener("click",function(){
    if(passF.type=="password"){
        eyeClose.className='fas fa-eye-slash';
        passF.type="text";
        eyeClose.style.opacity="0.8";
    }
    else{
        passF.type="password";
        eyeClose.className='fas fa-eye';
    }
});