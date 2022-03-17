//screen.width;

function InfoDropdown() {
    var x = document.getElementById("dropdown");
    if (x.style.display === "block") {
        x.style.display = "none";
    } 
    else {
        x.style.display = "block";
    }
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
/*function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ':' + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

function Start() {
    var fiveMinutes = 60 * 30;
    display = document.getElementById('time');
    startTimer(fiveMinutes, display);
};*/

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
}

function Size() {
    alert(screen.width);
}

function Open(parent,child) {
    var x = document.getElementById(child);
    var y = document.getElementById(parent);
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