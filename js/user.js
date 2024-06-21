const SearchInput=document.querySelector(".users .search input");
const SearchBtn=document.querySelector(".users .search button");


SearchBtn.addEventListener("click",function(){
    SearchInput.classList.toggle("active");
    SearchInput.focus();
    SearchBtn.classList.toggle("active");
});
SearchInput.addEventListener("click",function(){
    SearchInput.classList.toggle("active");
    SearchInput.focus();
    SearchBtn.classList.toggle("active");
});

setInterval(()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("GET", "php/user.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                console.log(data);
            }
        }
    }

    xhr.send();
},500)