/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready( function(){
    $("#Menu").css("background-color","black"); 

    $("#toggle-Menu").click(function(e) {
        e.preventDefault();
        $("#Menu").toggleClass("toggled");
    });
    
});

