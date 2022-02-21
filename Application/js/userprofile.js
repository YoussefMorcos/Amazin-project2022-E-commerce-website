function validUsername()        //validate username requirement
{
    if(newUsername.value.length < 5)
    {
        alert("The username provided does not meet the minimum requirement.");
        newUsername.focus();
        return false;
    } else
    return true;
}

function validEmail()       // validate email pattern
{
    // email pattern
    var pattern = /^\b.[A-Z0-9\._-]*@(?:[A-Z0-9].\B)+(?:.[A-Z]{2,3})+$/i;

    // validate email pattern
    if (!(pattern.test(newEmail.value)))
    {
        alert("It is an invalid email address.");
        newEmail.focus();
        return false;
    } else
    return true;
}

function validPwd()         // validate password requirements
{
    var upperCase = /[A-Z]/g;
    var numbers = /[0-9]/g;

    if (!(newPwd.value.match(upperCase)) || !(newPwd.value.match(numbers)) || (newPwd.value.length < 8) ) 
    {
        alert("The new password provided does not meet the minimum requirements.");
        newPwd.focus();
        return false;
    } else        
    return true;
}


//UPDATE FUNCTION

function validUser()
{
    // no new information to change
    if ((newUsername.value =="" || newUsername.value ==null) && (newEmail.value =="" || newEmail.value ==null) && (newPwd.value =="" || newPwd.value==null))
    {
        alert("No changes were made in the user profile part.")
        return true;
    }

    // FOR USERNAME

    var newNameDisplay = document.getElementById("newUsernameDisplay"); // space for new username input

    if (newUsername.value =="" || newUsername.value ==null)     // no input for new username
    {
        true;
    } 
    else
        if(newUsername.value !="" || newUsername.value !=null)      // input for new username
        {
            var validationUsername = validUsername();       // validate the username requirement

            if(validationUsername==true)
            {
                // change value of username for the new value
                newNameDisplay.innerHTML = document.getElementById("newUsername").value;
        
                // change display to have the new username displayed
                document.getElementById("username").style.display = "none"
                document.getElementById("newUsernameDisplay").style.display = "block"

                alert("You have set the username.");
            }
        } 

    // FOR EMAIL

    var newMailDisplay = document.getElementById("newEmailDisplay"); // space for new input

    if (newEmail.value =="" || newEmail.value ==null) // empty input for new email
    {
        true;
    } 
    else
        if(newEmail.value != "" || newEmail.value!= null)       // input for new email
    {
        var validationEmail = validEmail();
        if(validationEmail==true)
        {
            // change value of username for the new value
            newMailDisplay.innerHTML = document.getElementById("newEmail").value;

            // change display to have the new email displayed
            document.getElementById("email").style.display = "none"
            document.getElementById("newEmailDisplay").style.display = "inline"
 
            alert("You have set the email address.");
        }
    }

    // FOR PASSWORD

    var currentPwd = document.getElementById("pwd"); // current password
    
    if(newPwd.value =="" || newPwd.value==null)
    {
        true;
    } 
    else
        if ((newPwd.value != "" || newPwd != null) && (currentPwd.value=="" || currentPwd.value==null))
        {
            alert("You must fill the current password in order to make change.");
            pwd.focus();
            return false;
        } 
        else
            if (newPwd.value !="" || newPwd.value !=null)
            {
                var validationPwd = validPwd();
                if(validationPwd==true)
                {
                    alert("You have set the password.");
                }
            }

    return true;
}


// SECOND PART : ADDRESS

// FOR POSTAL CODE

function validPostalCode()
{
    var postalCodePattern = /^[A-Z]\d[A-Z]\s\d[A-z]\d$/i;
    if(!(postalCodePattern.test(newPostCode.value)))
    {
        alert("Invalid postal. Please try again with the following format: A1B 2C3");
        newPostCode.focus();
        return false;
    }
    else
    return true;
}

// FOR PHONE NUMBER

function validTelNum()
{
    var telPattern = /^\d{3}-\d{3}-\d{4}$/;
    if (!(telPattern.test(newTelNum.value)))
    {
        alert("Please provide a valid phone number in this following format : 123-123-1234");
        newTelNum.focus();
        return false;
    }
    else
    return true;
}

// FUNCTION FOR VALIDATE NEW ADDRESS

function validAddress()
{
    // FOR FIRST NAME

    var newFNameDisplay = document.getElementById("newFName");  // space for new first name

    if(newFirstName.value =="" || newFirstName.value == null)       // empty input
    {
        true;
    }
    else
        if(newFirstName.value !="" || newFirstName.value != null)       // input value
        {

            newFNameDisplay.innerHTML = document.getElementById("newFirstName").value;

            //
            document.getElementById("fName").style.display = "none";
            document.getElementById("newFName").style.display = "block";

            alert("You have set the first name.");

        }

    // FOR LAST NAME

    var newLNameDisplay = document.getElementById("newLName");  // space for new first name

    if(newLastName.value =="" || newLastName.value == null)       // empty input
    {
        true;
    }
    else
        if(newLastName.value !="" || newLastName.value != null)       // input value
        {

            newLNameDisplay.innerHTML = document.getElementById("newLastName").value;

            //
            document.getElementById("lName").style.display = "none";
            document.getElementById("newLName").style.display = "block";

            alert("You have set the last name.");

        }
        
    // FOR STREET NAME

    var newStrtNameDisplay = document.getElementById("newStrtName");  // space for new first name

    if(newStreetName.value =="" || newStreetName.value == null)       // empty input
    {
        true;
    }
    else
        if(newStreetName.value !="" || newStreetName.value != null)       // input value
        {

            newStrtNameDisplay.innerHTML = document.getElementById("newStreetName").value;

            //
            document.getElementById("strtName").style.display = "none";
            document.getElementById("newStrtName").style.display = "block";

            alert("You have set the street name.");

        }

    // FOR APT NUMBER

    var newAptNumDisplay = document.getElementById("newAptNum");  // space for new first name

    if(newApt.value =="" || newApt.value == null)       // empty input
    {
        true;
    }
    else
        if(newApt.value !="" || newApt.value != null)       // input value
        {

            newAptNumDisplay.innerHTML = document.getElementById("newApt").value;

            //
            document.getElementById("aptNum").style.display = "none";
            document.getElementById("newAptNum").style.display = "block";

            alert("You have set the appartment number.");

        }

    // FOR POSTAL CODE

    var newPCodeDisplay = document.getElementById("newPostalCode");  // space for new first name

    if(newPostCode.value =="" || newPostCode.value == null)       // empty input
    {
        true;
    }
    else
        if(newPostCode.value !="" || newPostCode.value != null)       // input value
        {
            var validationPCode = validPostalCode();
            if(validationPCode==true)
            {

                newPCodeDisplay.innerHTML = document.getElementById("newPostCode").value;

                //
                document.getElementById("postalCode").style.display = "none";
                document.getElementById("newPostalCode").style.display = "block";

                alert("You have set the Postal Code.");
            }

        }

    // FOR PHONE NUMBER

    var newTelDisplay = document.getElementById("newTel");  // space for new first name

    if(newTelNum.value =="" || newTelNum.value == null)       // empty input
    {
        true;
    }
    else
        if(newTelNum.value !="" || newTelNum.value != null)       // input value
        {
            var validationTelNum = validTelNum();
            if(validationTelNum==true)
            {

                newTelDisplay.innerHTML = document.getElementById("newTelNum").value;

                //
                document.getElementById("tel").style.display = "none";
                document.getElementById("newTel").style.display = "block";

                alert("You have set the phone number.");
            }

        }
    return true;
}

                                    