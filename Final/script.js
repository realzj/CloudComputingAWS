var usernameError = document.getElementById("name-error");
var fnameError = document.getElementById("fname-error");
var lnameError = document.getElementById("lname-error");
var emailError = document.getElementById("email-error");
var phoneError = document.getElementById("phone-error");
var passportError = document.getElementById("passport-error");
var passwordError = document.getElementById("password-error");
var submitError = document.getElementById("submit-error");

function validateUsername(){
var  uname = document.getElementById("user_name").value;
if (uname.length == 0){
usernameError.innerHTML = "Username is Required";
return false;
}
if(uname.length <= 5){
  usernameError.innerHTML = "Username must be longer then 5 characters";
  return false;
}
usernameError.innerHTML = '<i class="fas fa-check-circle"></i>';
return true;

}

function validateFname(){
  var  fname = document.getElementById("fname").value;
  if (fname.length == 0){
  fnameError.innerHTML = "Field cannot be empty";
  return false;
  }
  if(!fname.match(/^[A-Za-z]*[A-Za-z]*$/)){
    fnameError.innerHTML = "No special characters allowed";
    return false;
  }

    
  fnameError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
  }

  function validateLname(){
    var  lname = document.getElementById("lname").value;
    if (lname.length == 0){
    lnameError.innerHTML = "Field cannot be empty";
    return false;
    }
    if(!lname.match(/^[A-Za-z]*[A-Za-z]*$/)){
      lnameError.innerHTML = "No special characters allowed";
      return false;
    }
  
      
    lnameError.innerHTML = '<i class="fas fa-check-circle"></i>';
      return true;
    }

    
    function validatePhone(){
      var  phone = document.getElementById("phone").value;
      if (phone.length == 0){
      phoneError.innerHTML = "Field cannot be empty";
      return false;
      }
      if(phone.length !== 11){
        phoneError.innerHTML = "Must be 11 digits long";
        return false;
      }
      if(!phone.match(/^[0-9]{11}$/)){
        phoneError.innerHTML = "Only digits";
        return false;
      }
    
        
      phoneError.innerHTML = '<i class="fas fa-check-circle"></i>';
        return true;
      }

      function validateEmail(){
        var  email = document.getElementById("email").value;
        if (email.length == 0){
        emailError.innerHTML = "Field cannot be empty";
    return false;
        }
        
   
      
         emailError.innerHTML = '<i class="fas fa-check-circle"></i>';
          return true; 
        }

        function validatePassport(){
          var  passport = document.getElementById("passport").value;
          if (passport.length == 0){
          passportError.innerHTML = "Field cannot be empty";
          return false;
          }
          if(passport.length !== 9){
            passportError.innerHTML = "Must be 9 digits long";
            return false;
          }
          passportError.innerHTML = '<i class="fas fa-check-circle"></i>';
          return true; 
        }

        function validatePassword(){
          var password = document.getElementById("password").value;
          if (password.length == 0){
          passwordError.innerHTML = "Field cannot be empty";
          return false;
          }
          if(password.length <= 5){
            passwordError.innerHTML = "Password must be longer then 5 characters";
            return false;
          }
          passwordError.innerHTML = '<i class="fas fa-check-circle"></i>';
          return true; 
        }

        function validateForm(){
          if(!validateUsername()  || !validateFname()  || !validateLname()  || !validateEmail()  || !validatePassport()  || !validatePhone()  || !validatePassword()){
            swal({
              title: "Invalid!",
              text: "Please fill out all fields correctly!",
              icon: "warning",
              button: "Aww yiss!",
            });
            submitError.style.display="block";
          submitError.innerHTML = "Please fix errors to successfully register"
          setTimeout(function(){submitError.style.display= "none"; }, 3000);
            return false;
            }
            swal({
              title: "Good job!",
              text: "Registration is complete!",
              icon: "success",
              button: "Continue",
            });

        }
     


      