function calculate(id, id2){
    var select = document.getElementById(id);
    var value = select.options[select.selectedIndex].value;
    var monthlypay = ((value - 10000) / 36).toFixed(2);
    document.getElementById(id2).innerHTML= "Down Payment: $10,000  Monthly Payment: $" + monthlypay + " for 36 Months"
}

function validateForm(){
    if (document.myForm.name.value==""){
        alert("Please provide your name");
        document.myForm.name.focus();
        return false;
    }
    if ((document.myForm.phone.value=="") || isNaN(document.myForm.phone.value) || (document.myForm.phone.value.length!=10)){
        alert("Please provide a valid phone number");
        document.myForm.phone.focus();
        return false;
    }
    if (document.myForm.email.value==""){
        alert("Please provide a valid email");
        document.myForm.email.focus();
        return false;
    }
    if (document.myForm.model.value=="-1"){
        alert("Select a car model");
        return false;
    }
    if (document.myForm.type.value=="-1"){
        alert("Select a model type");
        return false;
    }  
}

function validateSignUp(){
    if (document.myForm.firstname.value==""){
        alert("Please provide your first name");
        document.myForm.firstname.focus();
        return false;
    }
    if (document.myForm.lastname.value==""){
        alert("Please provide your lastname");
        document.myForm.lastname.focus();
        return false;
    }
    if (document.myForm.username.value==""){
        alert("Please provide a username");
        document.myForm.username.focus();
        return false;
    }
    if (document.myForm.email.value==""){
        alert("Please provide a valid email");
        document.myForm.email.focus();
        return false;
    }
    if (document.myForm.password.value==""){
        alert("Please provide a password");
        document.myForm.password.focus();
        return false;
    }
}

function validateLogin(){
    if (document.myForm.usernameLogin.value==""){
        alert("Please provide a username");
        document.myForm.usernameLogin.focus();
        return false;
    }
    if (document.myForm.passwordLogin.value==""){
        alert("Please provide a password");
        document.myForm.passwordLogin.focus();
        return false;
    }
}