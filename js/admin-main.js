let menuBtn = document.querySelector('#menu-btn');
let adminMenu = document.querySelector('.admin-menu');

menuBtn.onclick = ()=>{
adminMenu.classList.toggle('active');
}

let userBtn = document.querySelector('#user-btn');
let profile =document.querySelector('.profile');

userBtn.onclick = ()=>{
    profile.classList.toggle('active');
}