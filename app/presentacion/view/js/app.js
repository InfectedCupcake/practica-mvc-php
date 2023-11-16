$("#estilo1").on("click", function () {
    noStyle();
    $("#estilo1").text('');
    $("#estilo1").text('Ya no soy no estilo');

})


$("#estilo2").on("click", function () {
    reStyle(2);
})

$("#estilo3").on("click", function () {
    reStyle(3);
})

function noStyle() {
    console.log(document.styleSheets)
    document.styleSheets[0].disabled = true;
    document.styleSheets[1].disabled = true;
    document.styleSheets[2].disabled = true;
    document.styleSheets[3].disabled = true;

}
function reStyle(n) {
    console.log(document.styleSheets[n])
    document.styleSheets[n].disabled = true;
    //$("#tituloId").removeClass("titulo").addClass("titulo2");

}