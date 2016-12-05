window.onload=function(){
    var id = document.forms["form"]["ID"];
    var fname = document.forms["form"]["fname"];
    var lname = document.forms["form"]["lname"];
    var uname = document.forms["form"]["uname"];
    var pword = document.forms["form"]["pword"];
    var rpword = document.forms["form"]["rpword"];
    var button = document.getElementById('submit');

    button.onclick =function() {
        var pass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}/;
        var text = /[A-Za-z]/;

        if(id.value =='') {
            alert('User ID input needed');
            id.setAttribute('class','error');
            return false;
        }
        if (fname.value == "") {
            alert("First name must be filled out");
            fname.setAttribute('class','error');
            return false;
        }
        if (text.test(fname.value)) {
            fname.setAttribute('class','valid');
        }
        else{
            alert("Please enter a name using letters only");
            fname.setAttribute('class','error');
            return false;
        }
        if (lname.value == "") {
            alert("Last name must be filled out");
            lname.setAttribute('class','error');
            return false;
        }
        if (text.test(lname.value)) {
            lname.setAttribute('class','valid');
        }
        else{
            alert("Please enter a name using letters only");
            lname.setAttribute('class','error');
            return false;
        }
        if (uname.value == "") {
            alert("Username name must be filled out");
            uname.setAttribute('class','error');
            return false;
        }
        if (text.test(uname.value)) {
            uname.setAttribute('class','valid');
        }
        else{
            alert("Please enter a name using letters only");
            uname.setAttribute('class','error');
            return false;
        }
        if (pword.value == "") {
            alert("Please create a password");
            pword.setAttribute('class','error');
            return false;
        }
        if (pass.test(pword.value)) {
            pword.setAttribute('class','valid');
        }
        else{
            alert("The password field must be at least eight characters long, contain at least one uppercase, one lowercase, one number, and one special character.");
            pword.setAttribute('class','error');
            return false;
        }
        if (rpword.value == "") {
            alert("please confirm your password");
            rpword.setAttribute('class','error');
            return false;
        }
        if(pword.value != rpword.value){
            alert("passwords do not match");
            pword.setAttribute('class','error');
            rpword.setAttribute('class','error');
            return false;
        }
        else{
            pword.setAttribute('class','valid');
            rpword.setAttribute('class','valid');
        }
        alert("Form Sucessfully Created");
        document.location.href = '../newuser.php';
    };
};