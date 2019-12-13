//Forma larga de ver que está cargado correctamente
$(document).ready(function(){
    console.log("forma larga");
});
//Forma corta de ver que está cargado correctamente
$(function(){
    console.log("forma corta"); 
});

//Empezar
$(function(){
    console.log($("body > *"));
    
    //Acción sobre uno de los elementos () hay que arreglarlo
    $("h1").css(["color":"red", "background-color":"green"]);
});