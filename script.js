const validateEmail = (email) => {
    let pattern = /^[\w-]+(\.?[\w-]+)?@\w+\.[a-z]+$/i
    if (email.match(pattern)) {
        return true
    }
}

const validatePwd = (pwd) => {
    let pattern1 = /[a-z]+/
    let pattern2 = /[A-Z]+/
    let pattern3 = /\d+/
    // let pattern4 = /[\W_]+/
    let pattern5 = /^\S{8,18}$/
    let sentence = pwd
    if (sentence.match(pattern1) && sentence.match(pattern2) && sentence.match(pattern3) && sentence.match(pattern5)) {
        return true
    }
}
const mail = document.querySelector('#email')
const pwd = document.querySelector('#password')
const inputs = document.getElementsByClassName('input')
const btn = document.querySelector('#submit')
const mailError = document.querySelector('#mailError')
const pwdError = document.querySelector('#pwdError')
let boolMail = false
let boolPwd = false

mail.addEventListener('change', (e) => {
    if (validateEmail(e.target.value)) {
        if (!boolMail) {
            mail.style.border = "1px solid green";
            mailError.style.visibility = "hidden"
            boolMail = true
        } else {
            mail.style.border = "1px solid green";
            mailError.style.visibility = "hidden"
        }
    } else if (!e.target.value) {
        if (boolMail) {
            console.log('vide')
            mail.style.border = "1px solid grey"
            mailError.style.visibility = "hidden"
            boolMail = false
        } else {
            console.log('vide')
            mail.style.border = "1px solid grey"
            mailError.style.visibility = "hidden"
        }
    } else {
        if (boolMail) {
            mail.style.border = "1px solid red"
            mailError.style.visibility = "visible"
            boolMail = false
        } else {
            mail.style.border = "1px solid red"
            mailError.style.visibility = "visible"
        }
    }
    if (boolMail && boolPwd) {
        console.log('youpi')
        btn.disabled = false
    } else {
        console.log('oh no')
        btn.disabled = true
    }
})
pwd.addEventListener('keyup', (e) => {
    if (validatePwd(e.target.value)) {
        if (!boolPwd) {   
            pwd.style.border = "1px solid green"
            pwdError.style.visibility = "hidden"        
            boolPwd = true
        } else {
            pwd.style.border = "1px solid green"
            pwdError.style.visibility = "hidden" 
        }
    } else if (!e.target.value) {
        if (boolPwd) {
            pwd.style.border = "1px solid grey"
            pwdError.style.visibility = "hidden" 
            boolPwd = false
        } else {
            pwd.style.border = "1px solid grey"
            pwdError.style.visibility = "hidden" 
        }
    } else {
        if (boolPwd) {
            pwd.style.border = "1px solid red"
            pwdError.style.visibility = "visible" 
            boolPwd = false
        } else {
            pwd.style.border = "1px solid red"
            pwdError.style.visibility = "visible" 
        }
    }
    if (boolMail && boolPwd) {
        console.log('youpi')
        btn.disabled = false
    } else {
        console.log('oh no')
        btn.disabled = true
    }
})