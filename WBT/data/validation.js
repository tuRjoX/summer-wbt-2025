let user ={
    username: 'turjo',
    password: 'password123'
}
function saveContactData(data) {
    localStorage.setItem('contactFormData', JSON.stringify(data));
}

function checkLogin(username, password) {
    return username === user.username && password === user.password;
}
function getContactData() {
    return JSON.parse(localStorage.getItem('contactFormData'));
}
