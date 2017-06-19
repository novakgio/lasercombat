$(document).ready(function(){ 
    var line = document.getElementById('overlay').offsetHeight;
    var content = document.getElementById('middle-cont').offsetHeight;
    $('#middle-cont').css("margin-top", (line - content)/2 );
});