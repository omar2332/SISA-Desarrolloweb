function validar(){
    var fname, lname, email, phone, val_email;
    fname = document.getElementById("fname").value;
    lname = document.getElementById("lname").value;
    email = document.getElementById("email").value;
    phone = document.getElementById("phone").value;
    val_email = /\w+@\w+\.+[a-z]/;

    if (fname === "" || lname === "" || email === "" || phone === ""){
        alert ("Todos los campos deben estar llenos");
        return false;
    }
    else if(fname.lenght>20){
        alert ("El nombre es muy largo");
        return false;
    }
    else if(lname.lenght>20){
        alert ("Los apellidos son muy largo");
        return false;
    }
    else if(email.lenght>20){
        alert ("El correo electronico es muy largo");
        return false;
    }
    else if(!val_email.test(email)){
        alert("El correo no es valido");
        return false;
    }
    else if(phone.lenght>20){
        alert ("El numero de telefono es muy largo");
        return false;
    }
    else if(isNaN(phone)){
        alert("El telefono ingresado no es un numero");
        return false;
    }
}