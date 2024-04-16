let loader = document.querySelector(".loader");

window.onload = function (){
    setInterval(()=>{
        loader.style.display = "none"
    },1000)
}


let userProfile= document.querySelector(".user-profile");
let userBtn=document.querySelector("#user-btn");

userBtn.onclick = () =>{
    userProfile.classList.toggle("active")
}

let userMenu =document.querySelector(".user-menu");
let menuBtn =document.querySelector("#menu-btn");

menuBtn.onclick = ()=>{
    userMenu.classList.toggle("active");
}