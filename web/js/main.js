$(function() {
    $('.tooltip').tipTip();

     $('#language, #project').change( function() {
        var lang = $("#language").val();
        var idProj = $("#project").val();
        url = '?lang='+lang+'&idProj='+idProj;
        document.location.href = url;
    });
});
function openDialog(url, divName) 
{
    $("#dialog" + divName).html('<iframe id="if' + divName + '" width="100%" height="100%" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto"/>').dialog("open");
    $("#if" + divName).attr("src", url);
    return false;
}