function InfoDropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.closest('.usermenu')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
    if (event.target.matches('.modal')) {
        var dropdowns = document.getElementsByClassName("modal");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function Info() {
    document.getElementById("myModal").classList.toggle("show");
}

function Timer(expire) {
    setInterval(function() {
        var now = parseInt(new Date().getTime() / 1000);
        var time = expire-now;
        var minutes = parseInt(time/60);
        var seconds = parseInt(time-minutes*60);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        document.getElementById("time").innerHTML = minutes+":"+seconds;
        if (time == 0) {
            window.location = "./?logout";
        }
    }, 1000);
}

function MenuSwap(bg) {
    var szoveg = document.getElementsByName("szoveg");
    var nav = document.getElementById("nav");
    if (screen.width <= 850) {
        if (bg == 1) {
            for (var i = 0; i < szoveg.length; i++) {
                szoveg[i].style.color = "blue";
            }
            nav.style.boxShadow = "none";
            nav.style.backgroundColor = "none";
        }
        else {
            for (var i = 0; i < szoveg.length; i++) {
                szoveg[i].style.color = "red";
            }
            nav.style.boxShadow = "rgba(17, 17, 26, 0.1) 0px 1px 0px";
            nav.style.backgroundColor = "white";
        }
    }
    else {
        if (bg == 1) {
            for (var i = 0; i < szoveg.length; i++) {
                szoveg[i].style = "color: var(--altcolor);";
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
}

function Open(parent,child) {
    var y = document.getElementById(parent);
    var x = document.getElementById(child);
    if(x.style.display === "table") {
        x.style.display = "none";
        y.style.borderBottomLeftRadius = "10px";
        y.style.borderBottomRightRadius = "10px";
        y.style.color = "var(--maincolor)";
        y.style.backgroundColor = "white";
    }
    else {
        x.style.display = "table";
        y.style.borderBottomLeftRadius = "0";
        y.style.borderBottomRightRadius = "0";
        y.style.color = "var(--altcolor)";
        y.style.backgroundColor = "var(--maincolor)";
    }
}