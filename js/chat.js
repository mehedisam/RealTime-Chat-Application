const form=document.querySelector(".typing-area");
const sendBtn=form.querySelector("button");
const msgArea=form.querySelector(".Message");
const outgoing= document.querySelector(".chat-box");
//const incoming= document.querySelector(".chat-box .incoming");
outgoing.onmouseenter = function(){
    outgoing.classList.add("active");
};
outgoing.onmouseleave = function(){
    outgoing.classList.remove("active");
};



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
                outgoing.scrollTop=outgoing.scrollHeight;
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
                if(!outgoing.classList.contains("active"))
                    outgoing.scrollTop=outgoing.scrollHeight;
                    
            }
        }
    }

    let formData= new FormData(form);

    xhr.send(formData);
},500);