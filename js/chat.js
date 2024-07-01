const form=document.querySelector(".typing-area");
const sendBtn=form.querySelector("button");
const msgArea=form.querySelector(".Message");
const outgoing= document.querySelector(".chat-box");
//const incoming= document.querySelector(".chat-box .incoming");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.addEventListener("click",function(){
    const xhr= new XMLHttpRequest();
    xhr.open("POST", "php/chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                msgArea.value="";
                // let data=xhr.response;
                // outgoing.innerHTML=data;
            }
        }
    }

    let formData= new FormData(form);

    xhr.send(formData);
});


setInterval(()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                outgoing.innerHTML=data;
                //console.log(flag);
                //if(flag==0)
                console.log(data);
               
            }
        }
    }

    let formData= new FormData(form);

    xhr.send(formData);
},500);