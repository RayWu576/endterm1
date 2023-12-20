function show_hide() {
    var signin = document.getElementById("signin-page");
    var signup = document.getElementById("signup-page");

    if (signin.style.display === "none") {
        signin.style.display = "block";  //signin出現
        document.getElementById("floatingID").value = "";
        document.getElementById("floatingPassword").value = "";
        signup.style.display = "none";  //signup消失
    } else {
        signin.style.display = "none";   //signin消失
        signup.style.display = "block"; //signup出現
        signup.style.visibility = "visible";

        document.getElementById("floatingID").value = "";
        document.getElementById("floatingPassword").value = "";
        document.getElementById("floatingeEail").value = "";
        document.getElementById("floatingDepartment").value = "";
        document.getElementById("floatingPhoneNumber").value = "";
    }
}


function validateForm() {
    var x = document.forms["registerForm"]["password"].value;
    var y = document.forms["registerForm"]["password_check"].value;
    if (x.length < 6) {
        alert("密碼長度不足");
        return false;
    }
    if (x != y) {
        alert("請確認密碼是否輸入正確");
        return false;
    }
}