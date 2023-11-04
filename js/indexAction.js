function NameError()
{
    const loginSection = document.getElementById("RegisterName").value;
    if(loginSection.trim() === "")
    {
        let p = document.getElementById("RegisterName_Error");
        p.innerHTML="Enter valid name"
    }
    else
    {
        let p = document.getElementById("RegisterName_Error");
        p.innerHTML=""
    }
}

function EmailError()
{
    let emailSection = document.getElementById("RegisterEmail").value;
    if(emailSection.trim() === "")
    {
        let p = document.getElementById("RegisterMail_Error");
        p.innerHTML="Enter the Email"
    }
    else if(!emailSection.endsWith("@gmail.com"))
    {
        let p = document.getElementById("RegisterMail_Error");
        p.innerHTML="Enter a valid Email"
    }
    else
    {
        let p = document.getElementById("RegisterMail_Error");
        p.innerHTML=""
    }
}

function PasswordError()
{
    let passwordSection = document.getElementById("RegisterPassword").value;
    if(passwordSection.trim() === "")
    {
        let p = document.getElementById("RegisterPassword_Error");
        p.innerHTML="Enter the Password"
    }
    else if(!passwordSection.length>=7)
    {
        let p = document.getElementById("RegisterPassword_Error");
        p.innerHTML="Password character should br greater than 7";
    }
    else
    {
        let p = document.getElementById("RegisterPassword_Error");
        p.innerHTML=""
    }
}



function RegisterButton() {
    $.ajax({
        url: "php/register.php",
        type: "post",
        data: $("#Register").serialize(),
        dataType: "json", // Specify that the response will be in JSON format
        success: function(data) {
            console.log(data); // Check the data received from the server
            alert(data.message);
        },
        
    });
}


function LoginButton() {
    $.ajax({
        url: "php/login.php",
        type: "post",
        data: $("#Login").serialize(),
        dataType: "json", // Specify that the response will be in JSON format
        success: function(data) {
            console.log(data); // Check the data received from the server
            alert(data.message);
        },
        
    });
}