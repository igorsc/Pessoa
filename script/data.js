/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function dateMask(inputData, e) {
    if (document.all) // Internet Explorer
        var tecla = event.keyCode;
    else //Outros Browsers
        var tecla = e.which;

    if (tecla >= 47 && tecla < 58) { // numeros de 0 a 9 e "/"
        var data = inputData.value;
        if (data.length == 2 || data.length == 5) {
            data += '/';
            inputData.value = data;
        }
    } else if (tecla == 8 || tecla == 0) // Backspace, Delete e setas direcionais(para mover o cursor, apenas para FF)
        return true;
    else
        return false;
}