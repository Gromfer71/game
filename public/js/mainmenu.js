var login = document.querySelector('#login');
var reg = document.querySelector('#reg');
var loginform = document.querySelector(".content__loginform");
var regform = document.querySelector(".content__regform");


login.addEventListener('click', function (event) {
    event.preventDefault();
    if (loginform.getAttribute('datavisible') == 0) {
        // loginform.style.display = "block";
        loginform.style.height = "350px";
        loginform.setAttribute('datavisible', "1")

    } else {
        loginform.setAttribute('datavisible', "0")
        loginform.style.height = "0";
    }
})
reg.addEventListener('click', function (event) {
    event.preventDefault();
    if (regform.getAttribute('datavisible') == 0) {
        // loginform.style.display = "block";
        regform.style.height = "450px";
        regform.setAttribute('datavisible', "1")

    } else {
        regform.setAttribute('datavisible', "0")
        regform.style.height = "0";
    }
})

var d = new Date;
document.querySelector('.header__date').innerHTML = d.toLocaleString()
setInterval(function UpdateDate() {
    var d = new Date;
    document.querySelector('.header__date').innerHTML = d.toLocaleString()

}, 1000);



