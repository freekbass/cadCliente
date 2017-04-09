function validarAnoBissexto(inputDate) {
    var date = inputDate.value;
    var d = new Date(date);

    var ano = d.getFullYear();

    if ((ano % 4 === 0) && ((ano % 100 !== 0) || (ano % 400 === 0))) {
        alert("Ano Bissexto")
    }
}
;