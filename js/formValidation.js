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
    marriageStatusDiv: "default",
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
            indicateError("passVerificationError", "repeatPasswordDiv");
            return false;

        }else {
            indicateSuccess("passVerificationError", "repeatPasswordDiv");
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

function checkLengths (min=-1, max, element, elementDivID, elementErrorID) {
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

    if (elementDiv) {
        //make div red
        elementDiv.classList.remove("has-success");
        elementDiv.classList.add("has-error");

        //take away green checkmark
        for (let el of elementDiv.getElementsByTagName("i")) {
            el.classList.add("hide");
        }


    }

    divStatus[elementDivID] = "has_error";

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

    //set div status
    divStatus[elementDivID] = "has_success";

    //remove submit error, if it was showing
    var subErr = document.getElementById("submitErr");
    if (subErr.classList.contains("show")) {
        subErr.classList.remove("show");
        subErr.classList.add("hide");
    }

}
function resetForm () {
    //divStatus is an object that holds the ids of each input div in the form and its status
    for (let key in divStatus) {
        if (divStatus.hasOwnProperty(key)) {
            var element = document.getElementById(key);

            // set status back
            divStatus[key] = "default";

            //remove green checkmarks
            for (let el of element.getElementsByTagName("i")) {
                el.classList.remove("show");
                el.classList.add("hide");
            }

            //remove error messages
            for (let el of element.getElementsByTagName("span")) {
                el.classList.remove("show");
                el.classList.add("hide");
            }

            //set div to regular color
            element.classList.remove("has-error");
            element.classList.remove("has-success");
        }
    }
    //Remove form error message
    var subErr = document.getElementById("submitErr");
    subErr.classList.remove("show");
    subErr.classList.add("hide");
    return false;
}
function checkForSuccess () {
    for (let key in divStatus) {
        if (divStatus.hasOwnProperty(key)) {
            if (divStatus[key] !== "has_success") { //if any has an error or has not been filled out
                if (!(key === "address2Div" && divStatus[key] === "default")) { //allow for optional address2
                    var subErr = document.getElementById("submitErr");
                    subErr.classList.remove("hide");
                    subErr.classList.add("show");
                    return false;
                }
            }
        }
    }
    return true;
}
