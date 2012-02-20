function enviar(){
    var club = $("#club").val();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();

    $.post('http://localhost/conquis/formularios.php',{
        'func':'formUnete','params':{
            'club'   :   club,
            'nombre' :   nombre,
            'mail'   :   email,
            'pass'   :   password,
            'pass2'  :   password2
        }},
        function(data){
            if(data==1){
                $(location).attr('href',"#error");
            }
            alert(data);
        });
}


$(document).ready(function(){
    var form_unete = $("#form_unete");
    var form_club = $("#form_club");
    
    form_unete.validate({
        rules : {
            club        :   "required",
            nombre      :   "required",
            email       :   "required",
            password    :   "required",
            password2   :   {
                                equalTo : "#password"
                            }
        },
                submitHandler   :   function(){ enviar() }
    });
    
    
    
    
    form_club.validate({
        rules : {
            club        :   "required",
            director    :   "required",
            iglesia     :   "required"
        }
    });
    
    
    
    
    
});