$(document).ready(function() {
    $('#summernote').summernote({
        lang: 'es-ES',
        height: 302,
        minHeight: 289,
        maxHeight: 302,
        toolbar: [
            ['style',['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['misc', ['undo','redo']],
        ]
    });
});
function AgregaPost() {
    var str, ruta=document.FormNuevoPost, error="";
    if(ruta.titulop.value == "")
    { error += "Debe agregar un titulo \n";}
    if(ruta.descripcion.value == "")
    { error += "Debe agregar una descripcion \n";}
    if(ruta.contenido.value == "")
    { error += "Debe agregar el contenido \n";}
    if(error!=""){ alert("Lista de Errores encontrados:\n\n"+error); return false; }
    var resultado=$.ajax({
        type:"POST",
        data:$("#FormNuevoPost").serialize(),
        url:'admin/admin_post.php',
        dataType:'text',
        async:false
    }).responseText;
    document.getElementById("InformacionPublicacion").innerHTML=resultado;
}
