function validateForm(event) {
   //event.preventDefault(); --> causes form not to be submitted

    //form validations here
    let userType = document.getElementById('user-type').value;
    let firstName = document.getElementById('first-name').value;
    let lastName = document.getElementById('last-name').value;
    let email = document.getElementById('email').value;
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    //let phone = document.getElementById('phone').value;
    //let address = document.getElementById('address').value;
    let termsCheckbox = document.getElementById('terms');

    //validations
    if (!userType || !firstName || !lastName || !email || !username || !password || !confirmPassword || !termsCheckbox.checked) {
        alert('All fields marked with * are mandatory.');
        return;
    }

    // Validate email format
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Invalid email format.');
        return;
    }

    // Password requirements checklist
    let passwordChecklist = document.getElementById('password-checklist');
    let requirementsMet = true;

    // Minimum length
    if (password.length < 8) {
        passwordChecklist.innerHTML = '<li>Password must be at least 8 characters long.</li>';
        requirementsMet = false;
    }

    // At least one letter
    if (!/[A-Za-z]/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one letter.</li>';
        requirementsMet = false;
    }

    // At least one number
    if (!/\d/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one number.</li>';
        requirementsMet = false;
    }

    // At least one special character
    if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one special character.</li>';
        requirementsMet = false;
    }

    if (!requirementsMet) {
        return;
    }

    // Checks if password and confirm password match
    if (password !== confirmPassword) {
        alert('Password and Confirm Password must match.');
        return;
    }


    // If all validations pass, you can submit the form or perform further actions
    alert('Form submitted successfully!');
}

//function to update the checklist dynamically while the user types
function updatePasswordChecklist() {
    let passwordChecklist = document.getElementById('password-checklist');
    passwordChecklist.innerHTML = ''; // Clear previous checklist

    let password = document.getElementById('password').value;

    // Password requirements checklist
    if (password.length < 8) {
        passwordChecklist.innerHTML += '<li>Password must be at least 8 characters long.</li>';
    }

    if (!/[A-Za-z]/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one letter.</li>';
    }

    if (!/\d/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one number.</li>';
    }

    if (!/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(password)) {
        passwordChecklist.innerHTML += '<li>Password must include at least one special character.</li>';
    }
}


// function to check if passwords match dynamically
function checkPasswordMatch() {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    let confirmMessage = document.getElementById('confirm-password-message');

    if (password !== confirmPassword) {
        confirmMessage.innerHTML = 'Passwords don\'t match.';
    } else {
        confirmMessage.innerHTML = ''; // Clear the message if passwords match
    }
}






