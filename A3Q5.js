// ------------------------------------------------------------------------------
// Assignment (3)Q5
// Written by: Poon Kai Alan Fok and student id(26816797))
// For SOEN 287 Section (Q) – Fall 2017
// -----------------------------------------------------------------------------
function getshow(){

    document.getElementById("DL").addEventListener("onmousemove", show, false);

}
function show() {
    var five = document.getElementById("five").checked;
    var six = document.getElementById("six").checked;
    var a = document.getElementById("price").value;
    var dl = document.getElementById("DL").checked;

    if((dl==true&&five==true)||(dl==true&&six==true))
    {
        document.getElementById('expert2').className = 'visible';

    }
    else if (a < 1001 && dl == true)
    {
        document.getElementById('expert1').className = 'visible';
    }
    else{
        document.getElementById('expert1').className = 'hidden';
        document.getElementById('expert2').className = 'hidden';
    }
}
window.addEventListener("load", getshow, false);
