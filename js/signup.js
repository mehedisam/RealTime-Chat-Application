const form=document.querySelector(".signup form");
const conBtn=document.querySelector(".signup form .button input");
const errorMsg=document.querySelector(".signup .error-text");


form.onsubmit = (e)=>{
    e.preventDefault();
}
conBtn.addEventListener("click",function(){
    const xhr= new XMLHttpRequest();
    xhr.open("POST", "php/signup.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                if(data=="success"){
                    location.href="user.php";
                }
                else{
                    errorMsg.textContent=data;
                    errorMsg.style.display="block";
                }
            }
        }
    }

    let formData= new FormData(form);

    xhr.send(formData);
});


