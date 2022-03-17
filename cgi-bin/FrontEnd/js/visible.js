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
    var szoveg = document.getElementsByName("szoveg");
    var nav = document.getElementById("nav");
    if (bg == 1) {
        for (var i = 0; i < szoveg.length; i++) {
            szoveg[i].style.color = "var(--altcolor)";
        }
        nav.style.boxShadow = "none";
        nav.style.backgroundColor = "none";
    }
    else {
        for (var i = 0; i < szoveg.length; i++) {
            szoveg[i].style.color = "var(--navcolor)";
        }
        nav.style.boxShadow = "rgba(17, 17, 26, 0.1) 0px 1px 0px";
        nav.style.backgroundColor = "white";
    }
}

function Open(parent,child) {
    var x = document.getElementById(child);
    var y = document.getElementById(parent);
    if(x.style.display === "table") {
        x.style.display = "none";
        y.style.borderBottomLeftRadius = "10px";
        y.style.borderBottomRightRadius = "10px";
    }
    else {
        x.style.display = "table";
        y.style.borderBottomLeftRadius = "0";
        y.style.borderBottomRightRadius = "0";
    }
}