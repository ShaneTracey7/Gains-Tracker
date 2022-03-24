/*
Final Project 
Class: Advanced Website Design
Name: Shane Tracey
Student ID: 105076627
Due: August 4th, 2021
(Javascript for Sign up/Registration page form)      
(c) 2021 Shane Tracey. All Rights Reserved. */

// checks if fields contains only letter or numbers 
function isAlpha (str)
{   
    var o_letters = /^[A-Za-z]+$/;
    var letters = /[A-Za-z]/;
    var float = /^(?!0\d)\d*(\.\d+)?$/; // float or int
    var o_digit = /^[0-9]+$/;
    if(str == "distance") // for fields with float 
    {
        if(document.getElementById(str).value.match(float))
        {
            return true;
        }
        alert(strMaker(str));
        return false;
    }
    else if(str == "age" || str == "eweight" || str == "ereps" || str == "esets") // for numbers only
    {
        // for testing alert("Str = " + str + " = age");
        if(document.getElementById(str).value.match(o_digit))
        {
            return true;
        }
        alert(strMaker(str));
        return false;
    }
    else // for letters only 
    {   // for testing alert("Str = " + str + " != age");
        if(document.getElementById(str).value.match(o_letters))
        {
            return true;
        }
        alert(strMaker(str));
        return false;
        
        
        
    }
}
// used to create alert content
function strMaker (str)
{
    str_return = "";
    switch(str)
    {
        case "age": {str_return = "Your Age can only consist of numbers.";break;}
        case "ln": {str_return = "Your last name can only consist of letters.";break;}
        case "fn": {str_return = "Your first name can only consist of letters.";break;}
        case "ename": {str_return = "The exercise name can only consist of letters.";break;}
        case "emuscle": {str_return = "The muscle name can only consist of letters.";break;}
        case "eweight": {str_return = "The weight field can only consist of numbers.";break;}
        case "ereps": {str_return = "The repetitions field can only consist of numbers.";break;}
        case "esets": {str_return = "The sets field can only consist of numbers.";break;}
        case "distance": {str_return = "The distance isn't a number or decimal value.";break;}
        case "location": {str_return = "The location field can only consist of letters.";break;}
        default: {str_return = "Default case(shouldn't happen";break;}
    }
    return str_return;
}


/* form validation for create account form. It checks everything except 
for a unique username(php in createAccount page handles that) */
function formVerification ()
{
    // user name has to be unique
    var fncount = document.getElementById("fn").value.length;
    var lncount = document.getElementById("ln").value.length;
    var ucount = document.getElementById("usernameca").value.length;
    var age = document.getElementById("age").value;
    var ecount = document.getElementById("email").value.length;
    //age checks
    //if(!isAlphaAge())
    if(!isAlpha("age"))
    {
    return false; //first name isn't alphabetical
    }
    else if (age < 14 || age > 100)
    {
    alert("You must be at least 14 years old to use Gains Tracker."); 
    return false;
    }
    // first and last name checks
    else if (fncount < 3 || fncount > 15)
    {
    alert("Your first name has to be within 3 and 15 letters."); 
    return false;
    }
    else if(lncount < 3 || lncount > 15)
    {
    alert("Your last name has to be within 3 and 15 letters."); 
    return false;
    }
    //else if(!isAlphafn())
    else if(!isAlpha("fn"))
    {
    return false; //first name isn't alphabetical
    }
    //else if(!isAlphaln())
    else if(!isAlpha("ln"))
    {
    return false; //last name isn't alphabetical
    }
    else if(ecount < 8 || ecount > 25)
    {
    alert("Not a valid length for an email."); 
    return false;
    }
    //username checks
    else if(ucount < 6 || ucount > 15)
    {
    alert("Your username has to be within 6 and 15 characters."); 
    return false;
    }
    // password check
    else if(!passwordCheck())
    {
    return false;
    }
    else // form is good (have to check username for uniqueness in php)
    {
        return true;
    }
    
}

function passwordCheck ()
{
var pvalue = document.getElementById("pwca").value;
var pcvalue = document.getElementById("pwc").value;
var pcount = pvalue.length;
var uppercase = /[A-Z]/;
var lowercase = /[a-z]/;
var digit = /[0-9]/;
//at least eight characters
if (pcount < 8 || pcount > 20)
    {
    alert("Your password has to have between 8 and 20 characters."); 
    return false;
    }
//at least one upper case and lower case letter
else if(pvalue.match(uppercase) == null || pvalue.match(lowercase) == null)
{
    alert("The password you entered doesn't have at least one upper case and one lower case letter."); 
    return false;
}
// at least one digit
else if(pvalue.match(digit) == null)
{
    alert("The password you entered doesn't have a digit. You need at least one digit to make your password."); 
    return false;
}
// at least one special character
else if(!pvalue.includes('@') && !pvalue.includes('#') && !pvalue.includes('$') && !pvalue.includes('%') && !pvalue.includes('^') && !pvalue.includes('&') && !pvalue.includes('*') && !pvalue.includes('!') && !pvalue.includes('-') && !pvalue.includes('_'))
{
    alert("The password you entered doesn't have a special character. You need at least one special character ( @ # $ % ^ & * ! - _ ) to make your password."); 
    return false;
}
// password matches
else if(pvalue.match(pcvalue) == null) // might be wonky
{
    alert("The passwords you entered don't match. You need to enter your password correct twice."); 
    return false;
}
// good password
else
{
return true; 
}
}
//form verification for exercise modal form (in beginWorkout.php)
function formVerificationE ()
{
    /*restrictions 
    ename = only letters (2 - 20 digits)
    emuscle = only letters (2 - 15 digits)
    eweight = only numbers (max 3 digits & weight > 0 )
    ereps = only numbers (max 3 digits & ereps > 0 )
    esets = only numbers (max 3 digits & ereps > 0 )
    */
    var ncount = document.getElementById("ename").value.length;
    var mcount = document.getElementById("emuscle").value.length;
    var weight = document.getElementById("eweight").value;
    var reps = document.getElementById("ereps").value;
    var sets = document.getElementById("esets").value;
    
    //exercise name checks
    if(!isAlpha("ename"))
    {
    return false; 
    }
    else if (ncount < 2 || ncount > 20)
    {
    alert("An exercise name must be between 2 and 20 letters long."); 
    return false;
    }
    // muscle checks
    else if(!isAlpha("emuscle"))
    {
    return false; 
    }
    else if (mcount < 2 || mcount > 15)
    {
    alert("A muscle name must be between 2 and 15 letters long."); 
    return false;
    }
    // weight checks
    else if(!isAlpha("eweight"))
    {
    return false; 
    }
    else if (weight <= 0 || weight > 999)
    {
    alert("A weight must be between 0lbs and 999lbs."); 
    return false;
    }
    // reps checks
    else if(!isAlpha("ereps"))
    {
    return false; 
    }
    else if (reps < 1 || reps > 999)
    {
    alert("Amount of reps must be between 1 and 999."); 
    return false;
    }
    // reps checks
    else if(!isAlpha("esets"))
    {
    return false; 
    }
    else if (sets < 1 || sets > 999)
    {
    alert("Amount of sets must be between 1 and 999."); 
    return false;
    }
    else // form is good 
    {
        return true;
    }
    
}

//form verification for Workout form (in beginWorkout.php)
function formVerificationBW ()
{
    /*restrictions
    WorkoutInfo:
    type = dropdown menu (don't touch)
    date = format(yyyy-mm-dd) dw bout it
    starttime = format(00:00:00) done in html
    endtime = format(00:00:00) done in html
    location = only letters (2 - 30 digits)


    Cardio:
    type = dropdown menu (don't touch)
    distance = float (numbers only and "." between 0 and 500) 
    duration = format(00:00:00) done in html

    */
    var lcount = document.getElementById("location").value.length;
    var distance = document.getElementById("distance").value;
    //location checks
    if(!isAlpha("location"))
    {
    return false; 
    }
    else if (lcount < 2 || lcount > 20)
    {
    alert("The location must be between 2 and 30 letters long."); 
    return false;
    }
    // distance checks
    else if(!isAlpha("distance"))
    {
    return false; 
    }
    else if (distance < 0 || distance > 500)
    {
    alert("The distance must be between 0km and 500km."); 
    return false;
    }
    else // form is good 
    {
        return true;
    }
    
}