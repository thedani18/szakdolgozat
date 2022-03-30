$(document).ready(function() {
    $('.jegy').hover(function() {
        $(this).children().toggleClass("tshow");
    });

    $(".tjegy").click(function() {
        $("#modtantargy").text($(this).parent().parent().parent().parent().attr("tantargy"));
        var index = $(this).parent().children().index($(this));
        var honap = $("#tbar").children(":eq("+index+")").text();
        $("#modnev").text($(this).parent().find("#tnev").text()+" - "+honap);
        $('#popup_table tr').slice(1).remove();
        if($(this).attr("jegyid") != "")
        {
            var list = $(this).attr("jegyid").split(",");
            $.each( list, function( index, value ) {
                $.ajax({
                    type: "POST",
                    url: './BackEnd/Jegyekdb.php',
                    data: {id: value},
                    success: function(response)
                    {
                        var lista = $.parseJSON(response);
                        
                        $("#popup_table").append(
                            "<tr bid='"+value+"'>" +
                            "<td><input type='text' name='jegy' id='jegy' value='"+lista[0]+"' disabled></td>" +
                            "<td><input type='text' name='tema' id='tema' value='"+lista[1]+"' disabled></td>" +
                            "<td><input type='text' name='suly' id='suly' value='"+lista[2]+"' disabled></td>" +
                            "<td><input type='text' name='datum' id='datum  ' value='"+lista[3]+"' disabled></td>" +
                            "<td class='ceruza'><img src='./FrontEnd/img/ceruza.png' alt='ceruza.png'></td>" +
                            "<td class='kuka'><img src='./FrontEnd/img/kuka.png' alt='kuka.png'></td>" +
                            "</tr>"
                        );
                    }
                });
            });
        }
        document.getElementById("myPopup").classList.toggle("show");
    });

    $(".ceruza").click(function() {
        alert("asds");
        /*$(this).parent().find('input').each(function() {
            alert($(this).text());
        })*/
    }); 
});

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
    if (event.target.matches('.popup')) {
        var dropdowns = document.getElementsByClassName("popup");
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

function Close() {
    document.getElementById("myPopup").classList.toggle("show");
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
    var elems = document.querySelectorAll(".active");
    [].forEach.call(elems, function(el) {
        if (el != document.getElementById(child)) {
            el.classList.remove("active");
            setTimeout(function(){
                var opened = document.querySelectorAll(".opened");
                [].forEach.call(opened, function(x) {
                    if (x != document.getElementById(parent)) {
                        x.classList.remove("opened");
                    }
                });
            },400);
        }
    });
    if (!document.getElementById(child).classList.contains("active")) {
        document.getElementById(parent).classList.toggle("opened");
        document.getElementById(child).classList.toggle("active");
    }
    else {
        document.getElementById(child).classList.toggle("active");
        setTimeout(function(){
            document.getElementById(parent).classList.toggle("opened");
        },400);
        
    }
    
}