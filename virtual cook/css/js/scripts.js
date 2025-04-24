// JavaScript functions for form validation
function validateForm() {
    return checkEmails() && checkDate();
}

function checkEmails() {
    var email = document.getElementById('email').value;
    var confirmEmail = document.getElementById('confirm-email').value;
    var emailPattern = /^[a-z0-9._%+-]+@aston\.ac\.uk$/;
    if (!emailPattern.test(email) || !emailPattern.test(confirmEmail)) {
        alert('Please use a valid Aston University email address.');
        return false;
    }
    if (email !== confirmEmail) {
        alert('Emails do not match.');
        return false;
    }
    return true;
}

function checkDate() {
    var appointmentDate = document.getElementById('appointment-date').value;
    var currentDate = new Date().toISOString().split('T')[0];
    if (appointmentDate <= currentDate) {
        alert('Please select a future date.');
        return false;
    }
    return true;
}
