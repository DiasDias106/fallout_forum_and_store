const loginbtn = document.getElementById("login")
const registerbtn = document.getElementById("register")
const loginform = document.querySelector(".login-form")
const registerform = document.querySelector(".register-form")

loginbtn.addEventListener('click',()=>{
    loginbtn.style.backgroundColor = "#21264D"
    registerbtn.style.backgroundColor = "rgba(255,255,255,0.2)";
    loginform.style.left = "50%";
    registerform.style.left = "-50%"
    loginform.style.opacity = 1;
    registerform.style.opacity = 0;
})
registerbtn.addEventListener('click',()=>{
    loginbtn.style.backgroundColor = "rgba(255,255,255,0.2)";
    registerbtn.style.backgroundColor = "#21264D";
    loginform.style.left = "150%";
    registerform.style.left = "50%"
    loginform.style.opacity = 0;
    registerform.style.opacity = 1;
})

const logInputField = document.getElementById("logPassword");
const logInputIcon = document.getElementById("log-pass-icon");

const regInputField = document.getElementById("regPassword");
const regInputIcon = document.getElementById("reg-pass-icon")

function myLogPassword(){
    if(logInputField.type === "password"){
        logInputField.type = "text";

        logInputIcon.name = "eye-off-outline";
        logInputIcon.style.cursor = "pointer";
    }else{
        logInputField.type = "password";

        logInputIcon.name = "eye-outline";
        logInputIcon.style.cursor = "pointer";
    }
}
function myRegPassword(){
    if(regInputField.type === "password"){
        regInputField.type = "text";

        regInputIcon.name = "eye-off-outline";
        regInputIcon.style.cursor = "pointer";
    }else{
        regInputField.type = "password";

        regInputIcon.name = "eye-outline";
        regInputIcon.style.cursor = "pointer";
    }
}

function changeIcon(value){
    if(value.length > 0){
        logInputIcon.name = "eye-outline";
        regInputIcon.name = "eye-outline";

    }else{
        logInputIcon.name = "lock-closed-outline";
        regInputIcon.name = "lock-closed-outline";
    }
}