function clearFormFields() {
    document.getElementById("floatingID").value = "";
    document.getElementById("floatingPassword").value = "";
    document.getElementById("floatingeEail").value = "";
    document.getElementById("floatingDepartment").value = "";
    document.getElementById("floatingPhoneNumber").value = "";
}

function show_hide() {
    var signin = document.getElementById("signin-page");
    var signup = document.getElementById("signup-page");

    // if (signin.style.display === "none") {
    //     signin.style.display = "block";  //signin出現
    //     signup.style.display = "none";  //signup消失
    // } else {
    //     signin.style.display = "none";   //signin消失
    //     signup.style.display = "block"; //signup出現
    //     signup.style.visibility = "visible";
    // }
    if (signin.style.left === "50%") {
        signin.style.left = "70%";  // 移動到左邊，使其消失
        signup.style.left = "50%";    // 移動到中間，使其出現
        signup.style.visibility = "visible";  // 顯示註冊頁面
        signin.style.visibility = "hidden";   // 隱藏登入頁面
    } else {
        signup.style.left = "70%";  // 移動到左邊，使其消失
        signin.style.left = "50%";    // 移動到中間，使其出現
        signin.style.visibility = "visible";  // 顯示登入頁面
        signup.style.visibility = "hidden";   // 隱藏註冊頁面
    }

    clearFormFields();
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