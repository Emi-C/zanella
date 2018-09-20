//get articoli
$(document).ready(function(){
    getart();
});

function getart(){
    $.ajax({
        method: 'post',
        url: "get.php",
        dataType:"json"
    })

    .done(function(data) {
        var res="";
        $.each(data, function(i, e) {
            res+='<div class="articolo"><img style="max-width:300px; display:inline-block;margin:20px;" src="'+e.img+'"><br><btn class="del" id="'+e.id+'">elimina</btn></div>';
        });
        $("#results").html(res);
    })
    .fail(function() {
        alert('ko');
    });
}



//del articoli
$("#results").on('click','.del',function() {
    delart($(this).attr("id"));
});

function delart(artid){
    $.ajax({
        method: 'post',
        url: "del.php",
        data: {id:artid}
    })

    .done(function(){
        getart();
    })
    .fail(function() {
        alert('ko');
    });
}



//put articoli
$(".formin input").keyup(function(){
   checkform();
});



function checkform(){
	var err=0;
    if ($("[id*='imgflag']").val()==1){err=1}

    if (err!=1){$("#sbm").addClass("sbmok")}else{$("#sbm").removeClass("sbmok")}
}

$(".formin").on("click",".sbmok",function(){
    putart();
});


function putart(){
    var fd = new FormData();
  
    fd.append('img', $('#img')[0].files[0]);

    $.ajax({
        method: 'post',
        url: "up.php",
        data:fd,
        processData: false,
        contentType: false
    })

    .done(function() {
        $('[id*="img"]').val("");
        $('[id*="imgflag"]').val(1);
        $('[class*="imgupload"]').show("slow");
        $('[class*="imguploadok"]').hide("slow");
        $('[class*="imguploadstop"]').hide("slow");
        $('[id*="namefile"]').html("");

        getart();
    })
    .fail(function() {
        alert('Qualcosa è andato storto...');
    });
}



//upload principale
$('#img').change(function(){
//here we assign tu our text field #fileup the name of the selected file
    var res=$('#img').val();
    var arr = res.split("\\");
    var filename=arr.slice(-1)[0];
    filextension=filename.split(".");
    filext="."+filextension.slice(-1)[0];
    valid=[".jpg",".png",".jpeg",".bmp"];
//if file is not valid we show the error icon and the red alert
    if (valid.indexOf(filext.toLowerCase())==-1){
        $( ".imgupload" ).hide("slow");
        $( ".imguploadok" ).hide("slow");
        $( ".imguploadstop" ).show("slow");
        $('#namefile').css({"color":"red","font-weight":700});
        $('#namefile').html("Il file "+filename+" non è un'immagine!");
        $( "#imgflag" ).val(1);
    }else{
        //if file is valid we show the green alert
        $( ".imgupload" ).hide("slow");
        $( ".imguploadstop" ).hide("slow");
        $( ".imguploadok" ).show("slow");
        $('#namefile').css({"color":"green","font-weight":700});
        $('#namefile').html(filename);
        $('#imgflag').val(0);
    }
    checkform();
});
