const SearchInput=document.querySelector(".users .search input");
const SearchBtn=document.querySelector(".users .search button");
const UserList=document.querySelector(".users .users-list");
let flag=0;


SearchBtn.addEventListener("click",function(){
    SearchInput.classList.toggle("active");
    SearchInput.focus();
    SearchBtn.classList.toggle("active");
});
SearchInput.addEventListener("click",function(){
    SearchInput.classList.toggle("active");
    SearchInput.focus();
    SearchBtn.classList.toggle("active");
    SearchInput.value="";
});
SearchInput.addEventListener("keyup",function(){
    let searchValue= SearchInput.value;
    if(searchValue != ""){
        //flag=1;
        SearchInput.classList.add("active");
    }
    else{
        //flag=0;
        SearchInput.classList.remove("active");
    }
    const xhr= new XMLHttpRequest();
    xhr.open("POST", "php/search.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                
                UserList.innerHTML=data;
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchValue="+ searchValue);
});


setInterval(()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("GET", "php/user.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                if(!SearchInput.classList.contains("active")) 
                UserList.innerHTML=data;
                //console.log(flag);
                //if(flag==0)
               
            }
        }
    }

    xhr.send();
},500);