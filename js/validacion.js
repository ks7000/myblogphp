function Ingreso() {
    var str, ruta=document.FormIngreso, error="";
    if(ruta.username.value == "")
    { error += "Debe ingresar su usuario \n";}
    if(ruta.password.value == "")
    { error += "Debe ingresar su password \n";}
    if(error!=""){ alert("Lista de Errores encontrados:\n\n"+error); return false; }
    var resultado=$.ajax({
        type:"POST",
        data:$("#FormIngreso").serialize(),
        url:'include/autentica.php',
        dataType:'text',
        async:false
    }).responseText;
    document.getElementById("InformacionIngreso").innerHTML=resultado;
}
