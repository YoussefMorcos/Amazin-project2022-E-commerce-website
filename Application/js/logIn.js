function validateEmail()
{
    // NO EMPTY INPUTS
    if (email.value=="" || email.value==null) 
    {
        alert("Please provide your email address.");
        email.focus();
        return false;
    }
    else 
        // EMAIL PATTERN VALIDATION
        var mail = document.getElementById("email");
        var pattern = /^\b.[A-Z0-9\._-]*@(?:[A-Z0-9].\B)+(?:.[A-Z]{2,3})+$/i;

        // INVALID
        if (!(pattern.test(mail.value)))
        {
            alert("Incorrect email address or password. Please try again.");
            return false;
        }
        else
            if (pwd.value=="" || pwd.value==null) 
            {
                alert("Please provide your password in order to sign in.");
                pwd.focus();
                return false;
            } 

    return true;  
}
