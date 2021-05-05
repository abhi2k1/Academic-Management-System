document.addEventListener("DOMContentLoaded",
function (event){
    var self=this;
    document.querySelector("#form-group-id").style.display="none";
    document.querySelector("#form-group-dob").style.display="none";
    document.querySelector("#form-group-password").style.display="none";
    document.querySelector("#input-member-type").addEventListener("change",function (event) {
        if(document.querySelector("#input-member-type").value=="Admin") {
            document.querySelector("#form-group-id").style.display="block";
            document.querySelector("#form-group-dob").style.display="none";
            document.querySelector("#form-group-password").style.display="block";
            document.querySelector("#input-label-id").innerHTML="Admin ID";
        }
        if(document.querySelector("#input-member-type").value=="Employee") {
            document.querySelector("#form-group-id").style.display="block";
            document.querySelector("#form-group-dob").style.display="none";
            document.querySelector("#form-group-password").style.display="block";
            document.querySelector("#input-label-id").innerHTML="Employee ID";
        }
        if(document.querySelector("#input-member-type").value=="Student") {
            document.querySelector("#form-group-id").style.display="block";
            document.querySelector("#form-group-dob").style.display="block";
            document.querySelector("#form-group-password").style.display="block";
            document.querySelector("#input-label-id").innerHTML="Enrollment Number";
        }
    });
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
});