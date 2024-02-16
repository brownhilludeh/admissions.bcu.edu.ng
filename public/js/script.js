var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("msg").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("msg").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("red");
    letter.classList.add("green");
  } else {
    letter.classList.remove("green");
    letter.classList.add("red");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("red");
    capital.classList.add("green");
  } else {
    capital.classList.remove("green");
    capital.classList.add("red");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("red");
    number.classList.add("green");
  } else {
    number.classList.remove("green");
    number.classList.add("red");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("red");
    length.classList.add("green");
  } else {
    length.classList.remove("green");
    length.classList.add("red");
  }
}

