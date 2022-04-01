$(document).ready(function() {
    $('.jegy').hover(function() {
        $(this).children().toggleClass("tshow");
    });

    $(".tjegy").click(function() {
        $("#modtantargy").text($(this).parent().parent().parent().parent().attr("tantargy"));
        var index = $(this).parent().children().index($(this));
        var honap = $("#tbar").children(":eq("+index+")").text();
        var index2 = $(this).parent().index()
        var row = $("tr:eq("+index2+")").attr("did");
        alert(row);
        $(".mod-content").attr({honap: $("#tbar").children(":eq("+index+")").attr("honap")});
        $("#modnev").text($(this).parent().find("#tnev").text()+" - "+honap);
        $('#popup_table tr').slice(1).remove();
        if($(this).attr("jegyid") != "")
        {
            var list = $(this).attr("jegyid").split(",");
            $.each( list, function( index, value ) {
                $.ajax({
                    type: "POST",
                    url: './BackEnd/ajax.php',  
                    data: {id: value},
                    success: function(response)
                    {
                        var lista = $.parseJSON(response);
                        $("#popup_table").append(
                            "<tr bid='"+value+"'>" +
                            "<td id='pop_jegy'><input type='text' name='jegy' value='"+lista[0]+"' title='1-5 lehet jegyeket beírni!' disabled='true'></td>" +
                            "<td id='pop_tema'><input type='text' name='tema' value='"+lista[1]+"' title='témát lehet beírni maximum 200 karakterig!' disabled='true'></td>" +
                            "<td id='pop_suly'><input type='text' name='suly' value='"+lista[2]+"' title='a jegy súlyozása (100%,200%,300%)!' disabled='true'></td>" +
                            "<td id='pop_datum'><input type='text' name='datum' value='"+lista[3]+"' title='csak a nap módosítása lehetséges!' disabled='true'></td>" +
                            "<td class='modositas'>" +
                                "<img id='ceruza' src='./FrontEnd/img/ceruza.png' alt='ceruza.png'>" +
                                "<img id='pipa' src='./FrontEnd/img/pipa.png' alt='pipa.png'>" +
                            "</td>" +
                            "<td class='torles'><img id='kuka' src='./FrontEnd/img/kuka.png' alt='kuka.png'></td>" +
                            "</tr>"
                        );
                    }
                });
            });
        }
        document.getElementById("myPopup").classList.toggle("show");
    });

    $("body").on('click', '.modositas', function() {
        if (!($(this).parent().hasClass("editable"))) {
            //módosítás
            var opened = document.querySelectorAll(".editable");
            [].forEach.call(opened, function(x) {
                if (x != $(this).attr("id")) {
                    $(".editable input").prop( "disabled", true );
                    x.classList.remove("editable");
                }   
            });

            $(this).parent().addClass("editable");
            $(".editable input").prop( "disabled", false );
        }
        else {
            if ($(this).parent().hasClass("created")) {
                //véglegesítés INSERT
                if ($(".created #pop_jegy input").val() > 0 && $(".created #pop_jegy input").val() < 6) {
                    if ($.trim($(".created #pop_tema input").val()).length <= 200) {
                        if ($(".created #pop_suly input").val() == "100%" ||  $(".created #pop_suly input").val() == "200%" || $(".created #pop_suly input").val() == "300%") {
                            var honap = $(this).parent().parent().parent().parent().parent().attr("honap");
                            var datum = GetHonap(honap);
                            var begin = moment(datum["begin"], "YYYY-MM-DD").toDate();
                            var end = moment(datum["end"], "YYYY-MM-DD").toDate();
                            var mydate = moment($(".created #pop_datum input").val(), "YYYY-MM-DD").toDate();
                            if (mydate >= begin && mydate <= end) {
                                if (confirm('biztos szeretnéd módosítani?')) {
                                    var tmp = $(this);
                                    $.ajax({
                                        type: "POST",
                                        url: "./BackEnd/ajax.php",
                                        data: {
                                            vjegy: $(".created #pop_jegy input").val(),
                                            vtema: $(".created #pop_tema input").val(),
                                            vsuly: $(".created #pop_suly input").val(),
                                            vdatum: $(".created #pop_datum input").val()
                                        },
                                        success: function (response) {
                                            $(".editable input").prop( "disabled", true );
                                            $(tmp).parent().removeClass("editable");
                                            $(tmp).parent().removeClass("created");
                                        }
                                    });
                                }
                            }
                            else {  
                                alert("Csak az adott év, "+honap+". hónapjában módosíthatod!");
                            }
                        }
                        else {
                            alert("Nem létezik ilyen súlyozás!");
                        }
                    }
                    else {
                        alert("Túl hosszú a téma!");
                    }
                }
                else {
                    alert("Nem létezik ilyen jegy!");
                }
            }
            else {
                //véglegesítés UPDATE
                if ($(".editable #pop_jegy input").val() > 0 && $(".editable #pop_jegy input").val() < 6) {
                    if ($.trim($(".editable #pop_tema input").val()).length <= 200) {
                        if ($(".editable #pop_suly input").val() == "100%" ||  $(".editable #pop_suly input").val() == "200%" || $(".editable #pop_suly input").val() == "300%") {
                            var honap = $(this).parent().parent().parent().parent().parent().attr("honap");
                            var datum = GetHonap(honap);
                            var begin = moment(datum["begin"], "YYYY-MM-DD").toDate();
                            var end = moment(datum["end"], "YYYY-MM-DD").toDate();
                            var mydate = moment($(".editable #pop_datum input").val(), "YYYY-MM-DD").toDate();
                            if (mydate >= begin && mydate <= end) {
                                if (confirm('biztos szeretnéd módosítani?')) {
                                    var tmp = $(this);
                                    $.ajax({
                                        type: "POST",
                                        url: "./BackEnd/ajax.php",
                                        data: {
                                            bid: $(this).parent().attr("bid"),
                                            bjegy: $(".editable #pop_jegy input").val(),
                                            btema: $(".editable #pop_tema input").val(),
                                            bsuly: $(".editable #pop_suly input").val(),
                                            bdatum: $(".editable #pop_datum input").val()
                                        },
                                        success: function (response) {
                                            $(".editable input").prop( "disabled", true );
                                            $(tmp).parent().removeClass("editable");
                                        }
                                    });
                                }
                            }
                            else {  
                                alert("Csak az adott év, "+honap+". hónapjában módosíthatod!");
                            }
                        }
                        else {
                            alert("Nem létezik ilyen súlyozás!");
                        }
                    }
                    else {
                        alert("Túl hosszú a téma!");
                    }
                }
                else {
                    alert("Nem létezik ilyen jegy!");
                }
            }
        }
    });

    $("body").on('click', '.torles', function() {
        if (confirm('biztos szeretnéd törölni?')) {
            var tmp = $(this);
            $.ajax({
                type: "POST",
                url: "./BackEnd/ajax.php",
                data: {torlesid: $(this).parent().attr("bid")},
                success: function (response) {
                    tmp.parent().remove();
                }
            });
        }
    });

    $("body").on('click', '#plusz', function () {
        var honap = $(this).parent().parent().parent().attr("honap");
        var datum = GetHonap(honap);
        $("#popup_table").append(
            "<tr bid='"+Last()+"' class='created editable'>" +
            "<td id='pop_jegy'><input type='text' name='jegy' placeholder='4' title='1-5 lehet jegyeket beírni!'></td>" +
            "<td id='pop_tema'><input type='text' name='tema' placeholder='téma' title='témát lehet beírni maximum 200 karakterig!'></td>" +
            "<td id='pop_suly'><input type='text' name='suly' placeholder='100%' title='a jegy súlyozása (100%,200%,300%)!'></td>" +
            "<td id='pop_datum'><input type='text' name='datum' placeholder='"+datum["begin"]+"' title='csak a nap módosítása lehetséges!'></td>" +
            "<td class='modositas'>" +
                "<img id='ceruza' src='./FrontEnd/img/ceruza.png' alt='ceruza.png'>" +
                "<img id='pipa' src='./FrontEnd/img/pipa.png' alt='pipa.png'>" +
            "</td>" +
            "<td class='torles'><img id='kuka' src='./FrontEnd/img/kuka.png' alt='kuka.png'></td>" +
            "</tr>"
        );
    });
    //TODO újnál class létrehozás és akkor kuka nem elérhető
    //és ha van más ilyen class akkor nem enged létre hozni még egyet
}); 

function GetHonap(honap) {
    var datum;
    $.ajax({
        async: false,
        type: "POST",
        url: "./FrontEnd/functions/ajax.php",
        data: {honap: honap},
        success: function (response) {
            datum = $.parseJSON(response);
        }
    });
    return datum;
}

function Last() {
    var id;
    $.ajax({
        async: false,
        type: "POST",
        url: './BackEnd/ajax.php',
        data: {last: "igaz"},
        success: function (response) {
            id = $.parseJSON(response);
        }
    });
    return id;
}

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
        location.reload(true);
    }
}

function Info() {
    document.getElementById("myModal").classList.toggle("show");
}

function Close() {
    document.getElementById("myPopup").classList.toggle("show");
    location.reload(true);
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