function openWMoptions(evt, wmName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(wmName).style.display = "block";
    evt.currentTarget.className += " active";
}


if (window.location.hash) {
    var wmName = window.location.hash.substring(1); //Puts hash in variable, and removes the # character	
}
