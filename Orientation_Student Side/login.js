document.getElementById("submit").onclick = function () {
   
    var user = document.getElementById("sisid").value;

var student_id = SELECT student_id FROM STUDENT WHERE student_id=$student;
var staff_id = SELECT staff_id FROM STAFF WHERE staff_id=$staff;
if (student_id!=NULL){
user="index.html"
}
else{
user="staffwp.html"
}
};

