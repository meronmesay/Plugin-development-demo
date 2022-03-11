const fr = document.querySelector('#myForm')
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const subject = document.getElementById('subject');

console.log(document);


fr.addEventListener("submit", event => {
    event.preventDefault();
 
    checkInputs();  
  });


  function checkInputs() {
    // trim to remove the whitespaces
    const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
    const emailValue = email.value.trim();
    const subjectValue = subject.value.trim();
    
    if(fnameValue === '') {
      
      setErrorFor(fname, 'First name can not be blank.');
      
    }
    if(fnameValue !== '' && fnameValue.length < 3) {
      
      setErrorFor(fname, 'First name must be greater than 3 characters.');
      
    }

    if(lnameValue === '') {
      setErrorFor(lname, 'Last name cannot be blank');
    }

    if(subjectValue === '') {
      setErrorFor(subject, 'Subject cannot be blank');
    }
    
    if(emailValue === '') {
      setErrorFor(email, 'Email cannot be blank');
    }
  
  function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const error = formControl.querySelector('div');
    error.hidden = false;
    error.innerText = message;
  }
  
}