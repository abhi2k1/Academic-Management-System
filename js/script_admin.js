document.addEventListener("DOMContentLoaded",
function (event){
    var self=this;
    document.querySelector("#form-group-question").style.display="none";
    document.querySelector("#form-group-option1").style.display="none";
    document.querySelector("#form-group-option2").style.display="none";
    document.querySelector("#form-group-option3").style.display="none";
    document.querySelector("#form-group-option4").style.display="none";
    document.querySelector("#form-group-correct").style.display="none";
    document.querySelector("#input-question-type").addEventListener("change",function (event) {
        if(document.querySelector("#input-question-type").value=="Question with text options") {
            document.querySelector("#form-group-question").style.display="block";
            document.querySelector("#form-group-option1").style.display="block";
            document.querySelector("#form-group-option2").style.display="block";
            document.querySelector("#form-group-option3").style.display="block";
            document.querySelector("#form-group-option4").style.display="block";
            document.querySelector("#form-group-correct").style.display="block";
            document.querySelector("#input-option1").type="text";
            document.querySelector("#input-option2").type="text";
            document.querySelector("#input-option3").type="text";
            document.querySelector("#input-option4").type="text";
            document.querySelector("#input-correct").type="text";
        }
        else if(document.querySelector("#input-question-type").value=="Question with image options") {
            document.querySelector("#form-group-question").style.display="block";
            document.querySelector("#form-group-option1").style.display="block";
            document.querySelector("#form-group-option2").style.display="block";
            document.querySelector("#form-group-option3").style.display="block";
            document.querySelector("#form-group-option4").style.display="block";
            document.querySelector("#form-group-correct").style.display="block";
            document.querySelector("#input-option1").type="file";
            document.querySelector("#input-option2").type="file";
            document.querySelector("#input-option3").type="file";
            document.querySelector("#input-option4").type="file";
            document.querySelector("#input-correct").type="file";
        }
    });
});