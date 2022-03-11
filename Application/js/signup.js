function validateRegistration()         // on submit
{
    // validate the form for no empty inputs
    if (username.value=="" || username.value==null) 
    {
        alert("Username must be filled out");
        username.focus();
        return false;
    }
    else 
        // validate username's length
        if (!(username.value.length > 5)) 
        {
            alert("The username provided does not meet the minimum requirement. Please try again.");
            username.focus();
            return false;
        } 
        else
            // no empty input
            if (email.value=="" || email.value==null) 
            {
                alert("Please provide a valid email address.");
                email.focus();
                return false;
            } 
            // else
            //     // email pattern
            //     var pattern = /^\b.[A-Z0-9\._-]*@(?:[A-Z0-9].\B)+(?:.[A-Z]{2,3})+$/i;
            //
            //     // validate email pattern
            //     if (!(pattern.test(email.value)))
            //     {
            //         alert("It is an invalid email address. Please try again.");
            //         return false;
            //     }
                else
                    // validate email and email confirmation
                    if (email.value != confirmEmail.value)
                    {
                        checkEmail();
                        return false;
                    }
                    else
                        // validate no empty input
                        if (pwd.value=="" || pwd.value==null) 
                        {
                            alert("Please provide a valid password.");
                            pwd.focus();
                            return false;
                        } 
                        else
                            // make sure the requirements of password are met
                            var upperCase = /[A-Z]/g;
                            var numbers = /[0-9]/g;

                            if (!(pwd.value.match(upperCase)) || !(pwd.value.match(numbers)) || (pwd.value.length < 8) ) 
                            {
                                alert("The password provided does not meet the minimum requirements. Please try again.");
                                pwd.focus();
                                return false;
                            } 
                            else
                                // validate the password and password confirmation
                                if (pwd.value != confirmPwd.value)
                            {
                                checkPwd();
                                return false;
                            }
                            else 
                            // validating address fieldset
                            if (firstName.value=="" || firstName.value==null)
                            {
                                alert("First name must be filled out.")
                                firstName.focus();
                                return false;
                            } 
                            else
                            if (lastName.value=="" || lastName.value==null)
                            {
                                alert("Last name must be filled out.")
                                lastName.focus();
                                return false;
                            } 
                            else
                            if (streetName.value=="" ||  streetName.value==null)
                            {
                                alert("Street name must be filled out.")
                                streetName.focus();
                                return false;
                            } 
                            else
                                if(postalCode.value =="" || postalCode.value == null )
                                {
                                    alert("Please provide a valid postal code for delivery.");
                                    postalCode.focus();
                                    return false;
                                }
                                else
                                    var postalCodePattern = /^[A-Z]\d[A-Z]\s\d[A-z]\d$/i;

                                    if(!(postalCodePattern.test(postalCode.value)))
                                    {
                                        alert("Please provide a valid postal. Format: A1B 2C3");
                                        postalCode.focus();
                                        return false;
                                    }
                                    // else
                                    //     if(phoneNumber.value == "" || phoneNumber.value==null)
                                    //     {
                                    //         alert("Please provide a phone number. Format : 123-123-1234");
                                    //         phoneNumber.focus();
                                    //         return false;
                                    //     }
                                        // else
                                        //     var phonePattern = /^\d{3}-\d{3}-\d{4}$/;
                                        //     if (!(phonePattern.test(phoneNumber.value)))
                                        //     {
                                        //         alert("Please provide a valid phone number in this following format : 123-123-1234");
                                        //         phoneNumber.focus();
                                        //         return false;
                                        //     }
                                        //     else
                                        //         if(!(cardnumber.value =="") || !(cardnumber.value == null))
                                        //         {
                                        //             checkCard();
                                        //             return false;
                                        //         }
                                                else
                                                    var newsLetter = document.getElementById("newsLetter").checked;
                                                    if(!(newsLetter))
                                                    {
                                                        alert("You must agree to the newsletter notification in order to sign up for a membership. You can withdraw your consent later.");
                                                        return false;
                                                    }
                                                    else
                                                        var agreement = document.getElementById("agreement").checked;
                                                        if(!(agreement)) 
                                                        {
                                                            alert("You must to the terms in order to sign up for a membership.");
                                                            return false;
                                                        } 
                                                        else

     return true;
}


// validation of password format on input

var pwdInput = document.getElementById("pwd");
var pwdCapital = document.getElementById("capital");
var pwdNumber = document.getElementById("number");
var pwdLength = document.getElementById("length");

pwdInput.onfocus = validateRequirements();

function validateRequirements()
{
    // validate password for capital letter(s)
    var upperCase = /[A-Z]/g;

    if(pwdInput.value.match(upperCase))
    {  
        pwdCapital.classList.remove("invalid");
        pwdCapital.classList.add("valid");
    } 
    else 
    {
        pwdCapital.classList.remove("valid");
        pwdCapital.classList.add("invalid");
    }

    // validate password for number(s)
    var numbers = /[0-9]/g;

    if(pwdInput.value.match(numbers)) 
    {  
        pwdNumber.classList.remove("invalid");
        pwdNumber.classList.add("valid");
    } 
    else 
    {
        pwdNumber.classList.remove("valid");
        pwdNumber.classList.add("invalid");
    }
    
    // validate password for its length
    if(pwdInput.value.length >= 8)
    {
        pwdLength.classList.remove("invalid");
        pwdLength.classList.add("valid");
    } 
    else 
    {
        pwdLength.classList.remove("valid");
        pwdLength.classList.add("invalid");
    }
}


// validation of username's length on input

var usernameInput = document.getElementById("username")
var usrLength = document.getElementById("usernameLength");

usernameInput.onfocus = validateUsernameLength();

function validateUsernameLength()
{
    if (username.value.length > 5) 
    {
        usrLength.classList.remove("invalid");
        usrLength.classList.add("valid");
    } 
    else 
    {
        usrLength.classList.remove("valid");
        usrLength.classList.add("invalid");
    }
}


// validation of email confirmation and provided email on input

var emailGiven = document.getElementById("email");
var emailConfirmation = document.getElementById("confirmEmail");

function checkEmail()
{
    if (emailGiven.value != emailConfirmation)
    {
        alert("Attention ! The two email addresses you provided are not the same. Please verify and try again.")
        confirmEmail.focus();
        return false;
    }
    else 
        return true;
}


// validation of password

var pwdGiven = document.getElementById("pwd");
var pwdConfirmation = document.getElementById("confirmPwd");

function checkPwd()
{
    if (pwdGiven.value != pwdConfirmation)
    {
        alert("Attention ! The two passwords you entered are not the same. Please verify and try again.")
        confirmPwd.focus();
        return false;
    }
    else 
        return true;
}


// validation for payment method
var cardnumber = document.getElementById("cardnumber");
var expirydate = document.getElementById("expirydate");
var securitycode = document.getElementById("securitycode");

function checkCard()
{

    if (cardnumber.value.length < 16 || cardnumber.value.length > 16)
    {
        alert("Invalid card number.");
        cardnumber.focus();
        return false;
    }
    else
        if(expirydate.value == "" || expirydate.value == null)
        {
            alert("Expiry date must be filled.");
            expirydate.focus();
            return false;
        }
        else
            if(securitycode.value == "" || securitycode.value == null)
            {
                alert("Security code must be filled.");
                securitycode.focus();
                return false;
            }
            else
                if(securitycode.value.length > 3 || securitycode.value.length <3)
                {
                    alert("Invalid security code.");
                    securitycode.focus();
                    return false;
                }
                else
                    return true;

}

