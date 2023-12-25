function clearFormFields() {
    document.getElementById("input-activity-name").value = "";
    document.getElementById("start-date").value = "";
    document.getElementById("end-date").value = "";
    document.getElementById("location").value = "";
    document.getElementById("organizer").value = "";
    document.getElementById("capacity").value = "";
    document.getElementById("cost").value = "";
    document.getElementById("register-deadline").value = "";
    document.getElementById("description").value = "";
    document.getElementById("year").value = "";
    document.getElementById("semester").value = "";
    document.getElementById("additional-info").value = "";
    document.getElementById("hours").value = "";
}

function show_hide() {
    var activity = document.getElementById("create-activity");
    var course = document.getElementById("create-course");

    if (activity.style.display === "none") {
        activity.style.display = "block";  //signin出現
        course.style.display = "none";  //signup消失
    } else {
        activity.style.display = "none";   //signin消失
        course.style.display = "block"; //signup出現
        //course.style.visibility = "visible";
    }

    clearFormFields();
}
