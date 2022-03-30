<!DOCTYPE html>
<html>
<head>
<script>
$(document).ready(function(){
    $(".tjegy").click(function(){
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
                        
                        $("#igen").append(
                            "<tr bid='"+value+"'>" +
                            "<td><input type='text' name='jegy' id='jegy' value='"+lista[0]+"'></td>" +
                            "<td><input type='text' name='tema' id='tema' value='"+lista[1]+"'></td>" +
                            "<td><input type='text' name='suly' id='suly' value='"+lista[2]+"'></td>" +
                            "<td><input type='text' name='datum' id='datum' value='"+lista[3]+"'></td>" +
                            "<td><img class='ceruza' src='./FrontEnd/img/ceruza.png' alt='ceruza.png'></td>" +
                            "<td><img class='kuka' src='./FrontEnd/img/kuka.png' alt='kuka.png'></td>" +
                            "</tr>"
                        );
                    }
                });
            });
            
        }
        else
        {
            $("#jegyek").append("<p>Szoptad</p>");
        }
        
    });
});
</script>
</head>
<body>
<table id="igen">
    <tr>
        <td class='tjegy' jegyid='1,2'><span>1,</span><span>2</span></td>
    </tr>
    <tr>
        <td class='tjegy' jegyid='3,4'><span>3,</span><span>4</span></td>
    </tr>
    <tr>
        <td class='tjegy' jegyid=''><span>1,</span><span>1</span></td>
    </tr>
</table>


<div id="jegyek">
	
</div>
</body>
</html>
