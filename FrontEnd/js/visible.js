function InfoDropdown() {
    var x = document.getElementById("dropdown");
    if (x.style.display === "block") {
        x.style.display = "none";
    } 
    else {
        x.style.display = "block";
    }
}

function MenuSwap(bg) {
    var x = document.getElementsByName("szoveg");
    var y = document.getElementById("nav");
    if (bg == 1) {
        for (var i = 0; i < x.length; i++) {
            x[i].style.color = "var(--altcolor)";
        }
        y.style.boxShadow = "none";
    }
    else {
        for (var i = 0; i < x.length; i++) {
            x[i].style.color = "var(--navcolor)";
        }
        y.style.boxShadow = "rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px";
    }
}