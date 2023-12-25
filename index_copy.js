function clearFormFields() {
    document.getElementById("floatingID").value = "";
    document.getElementById("floatingPassword").value = "";
    document.getElementById("floatingeEail").value = "";
    document.getElementById("floatingDepartment").value = "";
    document.getElementById("floatingPhoneNumber").value = "";
}

function show_hide() {
    var activity = document.getElementById("create-activity");
    var course = document.getElementById("create-course");

    if (activity.style.display === "none") {
        //signin.style.display = "block";  //signin出現
        course.style.display = "none";  //signup消失
    } else {
        activity.style.display = "none";   //signin消失
        //signup.style.display = "block"; //signup出現
        course.style.visibility = "visible";
    }

    clearFormFields();
}
