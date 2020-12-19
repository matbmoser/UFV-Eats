$(document).ready(function () {
    $("#formulario").bind("submit",function(){
        document.getElementById('nomv').style.display="none";
        document.getElementById('nomt').style.display="none";
        document.getElementById('usrv').style.display="none";
        document.getElementById('usrt').style.display="none";
        document.getElementById('usru').style.display="none";

        document.getElementById('emav').style.display="none";
        document.getElementById('emac').style.display="none";
        document.getElementById('emau').style.display="none";

        document.getElementById('clan').style.display="none";
        document.getElementById('clac').style.display="none";
        document.getElementById('inputPassword').style.border="1px solid #ced4da";
        document.getElementById('inputPassword1').style.border="1px solid #ced4da";
        document.getElementById('inputEmail').style.border="1px solid #ced4da";
        document.getElementById('inputusrid').style.border="1px solid #ced4da";
        document.getElementById('inputname').style.border="1px solid #ced4da";
        var btnEnviar = $("#btnEnviar");
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
            success: function(data){
                $(".respuesta").html(data);
                 sleep(500);
                if(data == 10000)
                    return fin();
                else{
                    if (data[1] == 1)
                        nomv();
                    else if (data[1] == 2)
                        nomt();
                    if (data[2] == 1)
                        usrv();
                    else if (data[2] == 2)
                        usrt();
                    else if (data[2] == 3)
                        usru();
                    if (data[3] == 1)
                        emav();
                    else if (data[3] == 2)
                        emac();
                    else if (data[3] == 3)
                        emau();
                    if (data[4] == 1)
                        clac();
                    else if (data[4] == 2)
                        clan();
                }
            },
            error: function(data){
                alert("Error al enviar el formulario");
            }
        });
        return false;
    });
});
function sleep(tim) {
  const date = Date.now();
  let now = null;
  do {
    now = Date.now();
  } while (now - date < tim);
}
function nomv(){
    document.getElementById('nomv').style.display="block";
    document.getElementById('inputname').style.border="1px solid red";
};
function nomt(){
    document.getElementById('nomt').style.display="block";
    document.getElementById('inputname').style.border="1px solid red";
};

function usrv(){
    document.getElementById('usrv').style.display="block";
    document.getElementById('inputusrid').style.border="1px solid red";
};
function usrt(){
    document.getElementById('usrt').style.display="block";
    document.getElementById('inputusrid').style.border="1px solid red";
};
function usru(){
    document.getElementById('usru').style.display="block";
    document.getElementById('inputusrid').style.border="1px solid red";
};

function emav(){
    document.getElementById('emav').style.display="block";
    document.getElementById('inputEmail').style.border="1px solid red";
};
function emac(){
    document.getElementById('emac').style.display="block";
    document.getElementById('inputEmail').style.border="1px solid red";
};
function emau(){
    document.getElementById('emau').style.display="block";
    document.getElementById('inputEmail').style.border="1px solid red";
};

function clac(){
    document.getElementById('clac').style.display="block";
    document.getElementById('inputPassword').style.border="1px solid red";
    document.getElementById('inputPassword1').style.border="1px solid red";
};
function clan(){
    document.getElementById('clan').style.display="block";
    document.getElementById('inputPassword').style.border="1px solid red";
    document.getElementById('inputPassword1').style.border="1px solid red";
};

function fin(){
    window.location ="../../index.php";
};