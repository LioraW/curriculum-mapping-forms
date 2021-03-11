var divStatus = {
    usernameDiv: "default",
    passwordDiv: "default",
    repeatPasswordDiv: "default",
    firstNameDiv: "default",
    lastNameDiv: "default",
    address1Div: "default",
    address2Div: "default",
    cityDiv: "default",
    stateDiv: "default",
    zipDiv: "default",
    phoneDiv: "default",
    emailDiv: "default",
    genderDiv: "default",
    marriageStatus: "default",
    DOBDiv: "default",

};

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

    if (regex.test(password)) {
        indicateSuccess("passwordError", "passwordDiv");
        return true;
    }else {
        indicateError("passwordError", "passwordDiv");
        return false;
    }

}
function checkEmail () {
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
    var zipElem = document.getElementById("zip");
    var zip = zipElem.value;
    var regex = /^\s*(\d{5})[-. ]*(\d{4})?\s*$/;

    if (regex.test(zip)) {

        var zipSections = zip.match(regex);
        var adjustedZip= zipSections[1];

        if (zipSections[2]) {
            adjustedZip = adjustedZip + "-" + zipSections[2];
        }

        zipElem.value = adjustedZip;

        indicateSuccess("zipErr", "zipDiv");
        return true;
    }else {
        indicateError ("zipErr", "zipDiv");
        return false;
    }
}
function adjustPhone () {
    var phone = document.getElementById("phone");
    var phoneNum = phone.value;
    var regex = /^\s*[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})\s*$/;

     if (regex.test(phoneNum)) {
         var phoneSections = phoneNum.match(regex);
         phone.value = phoneSections[1] + "-" + phoneSections[2] + "-" + phoneSections[3];

         indicateSuccess("phoneErr", "phoneDiv");
         return true;
    }else {
        indicateError ("phoneErr", "phoneDiv");
        return false;
    }
}

function checkLengths (min, max, element, elementDivID, elementErrorID) {
    var inputLength = element.value.length;

    if (max && min && inputLength) {
        if (inputLength > max || inputLength < min) {
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

function indicateError (msgID, elementDivID) {
    var msg = document.getElementById(msgID);
    var elementDiv = document.getElementById(elementDivID);

    //show error message
    if (msg) {
        msg.classList.remove("hide");
        msg.classList.add("show");
    }
    //make element div indicate error (red)
    if (elementDiv) {
        //make div red
        elementDiv.classList.remove("has-success");
        elementDiv.classList.add("has-error");

        //take away green checkmark
        for (let el of elementDiv.getElementsByTagName("i")) {
            el.classList.add("hide");
        }
    }

    //Don't allow the user to submit invalid data
    var submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.disabled = true;
    }
}
function indicateSuccess (msgID, elementDivID) {
    var msg = document.getElementById(msgID);
    var elementDiv = document.getElementById(elementDivID);

    //hide error message
    if (msg) {
        msg.classList.add("hide");
        msg.classList.remove("show");
    }
    //make element div indicate success
    if (elementDiv) {
        //make div green
        elementDiv.classList.add("has-success");
        elementDiv.classList.remove("has-error");

        //show green checkmark
        for (let el of elementDiv.getElementsByTagName("i")) {
            el.classList.remove("hide");
        }
    }

    //allow the user to submit valid data
    var submitBtn = document.getElementById("submitBtn");
    if (submitBtn) {
        submitBtn.disabled = false;
    }
}
function resetForm () {
    for (let key in divStatus) {
        if (divStatus.hasOwnProperty(key)) {
            //this assumes the keys are all the id's of each form div
            var element = document.getElementById(key);

            // set status
            divStatus[key] = "default";

            //remove green checkmarks
            for (let el of element.getElementsByTagName("i")) {
                if (!el.classList.contains("hide")) {
                    el.classList.add("hide");
                }
            }

            //remove error messages
            for (let el of element.getElementsByTagName("span")) {
                el.classList.remove("show");
                if (!el.classList.contains("hide")) {
                    el.classList.add("hide");
                }
            }

            //set div to regular color
            if (element.classList.contains("has-error")) {
                element.classList.remove("has-error");
            }else if (element.classList.contains("has-success")) {
                element.classList.remove("has-success");
            }

            console.log(key + " -> " + divStatus[key]);
        }
    }

}