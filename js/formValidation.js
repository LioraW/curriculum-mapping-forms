function matchPasswords() {
    var first = document.getElementById("password");
    var second = document.getElementById("repeatPassword");

    if (first && second) {

        //check if first value is empty, if not, do not check it yet
        if (first.value === "") {
            indicateError("passwordError", "passwordDiv");
            return false;
        }

        //check if first and second match
        if (first.value !== second.value) {
            indicateError("PassVerificationError", "repeatPasswordDiv");
            return false;

        }else {
            indicateSuccess("PassVerificationError", "repeatPasswordDiv");
            return true;
        }
    }
    return false;
}
function checkPassword () {
    var password = document.getElementById("password").value;

    var regex =/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,50}$/;

    if (regex.test(password)){
        indicateSuccess("passwordError", "passwordDiv");
        return true;
    }else {
        indicateError("passwordError", "passwordDiv");
        return false;
    }

}
function checkEmail (){
    var element = document.getElementById("email");
    var emailVal = String(element.value).trim();

    var index = emailVal.search(
        /^\S+@\S+\.\S+$/
    );

    if (index > -1 ) {
        indicateSuccess("emailVerError", "emailDiv");
        return true;
    }else {
        indicateError("emailVerError","emailDiv");
        return false;
    }
}
function adjustZip () {
    var zip = document.getElementById('zip');
    var zipVal = zip.value;

    if (zipVal.length > 5) {
        var firstPart = zipVal.substring(0, 5);

        //in case the user put in their own '-' or it was already put in by a previous run of this function
        var i = 5;
        while (zipVal[i] === '-'){
            i++;
        }
        var secondPart = zipVal.substring(i, zipVal.length);

        document.getElementById('zip').type = 'text'; //necessary for the '-' and if the zip has letters

        document.getElementById('zip').value = firstPart + "-" + secondPart;
    }else{
        document.getElementById('zip').type = 'number';
    }
}
function adjustPhone () {
    var phoneNum = document.getElementById('phone').value;
    var phoneSections;
    var adjustedPhone;

    if (phoneNum.length >= 7 ){

        if (phoneNum.length > 7){ //if the phone number does not match the standard American format of a three digit
                                  //area code and then a 7 digit phone number, this does not bother to format it.
            phoneSections = phoneNum.match(/(\d{3})(\d{3})(\d{4})/);
            adjustedPhone = phoneSections[1] + "-" + phoneSections[2] + "-" + phoneSections[3];

        } else { //its == 7
            phoneSections = phoneNum.match(/(\d{3})(\d{4})/);
            adjustedPhone = phoneSections[1] + "-" + phoneSections[2];
        }
        document.getElementById('phone').type = 'text'; //necessary for adding "-" but will check for numbers
                                                                //with regex
        document.getElementById('phone').value = adjustedPhone;

        indicateSuccess("phoneErr", "phoneDiv");
        return true;

    }else {
        indicateError ("phoneErr", "phoneDiv");
        return false;
    }
}

function checkLengths (min, max, element, elementDivID, elementErrorID){
    var inputLength = element.value.length;

    if (max && min && inputLength && elementDivID && elementErrorID){

        if (inputLength > max || inputLength < min){
            indicateError(elementErrorID, elementDivID);
            return false;

        }else {
            indicateSuccess(elementErrorID, elementDivID);
            return true;
        }
    }else {
        return false;
    }
}
function indicateError (msgID, elementDivID){
    var msg = document.getElementById(msgID);
    var elementDiv = document.getElementById(elementDivID);

    //show error message
    if (msg) {
        msg.classList.remove("hide");
        msg.classList.add("show");
    }
    //make element div indicate error (red)
    if (elementDiv) {
        elementDiv.classList.remove("has-success");
        elementDiv.classList.add("has-error");
    }

    //Don't allow the user to submit invalid data
    var submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.disabled = true;
    }
}
function indicateSuccess (msgID, elementDivID){
    var msg = document.getElementById(msgID);
    var elementDiv = document.getElementById(elementDivID);

    //hide error message
    if (msg) {
        msg.classList.add("hide");
        msg.classList.remove("show");
    }
    //make element div indicate success
    if (elementDiv) {
        elementDiv.classList.add("has-success");
        elementDiv.classList.remove("has-error");
    }

    //allow the user to submit valid data
    var submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.disabled = false;
    }
}