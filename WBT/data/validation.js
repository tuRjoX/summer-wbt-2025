// This file will store the contact form data and credentials for login
// In a real application, this would be handled by a backend server.
// For demo purposes, we use localStorage in the browser.
let user ={
    username: 'turjo',
    password: 'password123'
}
// Save contact form data and credentials to localStorage
function saveContactData(data) {
    localStorage.setItem('contactFormData', JSON.stringify(data));
}

// Check login credentials
function checkLogin(username, password) {
    return username === user.username && password === user.password;
}

// Get saved contact form data
function getContactData() {
    return JSON.parse(localStorage.getItem('contactFormData'));
}
