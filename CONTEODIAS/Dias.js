
function randomDate(start, end) {
    var date = new Date(+start + Math.random() * (end - start));
    return date;

}

    //inicio del año 2021 
    let date1 = new Date(2021,00,01);
    let date2 = new Date(2021,11,31);

    //Generacion de fecha aleatoria en el año 2021
    let hoy =  randomDate(date1, date2);

let dia= hoy.getDate();
let mes=hoy.getMonth()+1;
let agnio=hoy.getFullYear();

const months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];


let formato1 = `${dia}/${mes}/${agnio}`
let formato2 = `${agnio}/${mes}/${dia}`
let formato3 = `${agnio}/${months[hoy.getMonth()]}/${dia}`


function convertDateFormat(string) {
    var info = string.split('/');
    return info[2] + '/' + info[1] + '/' + info[0];
  }

 let formato1Cambio = convertDateFormat(formato1);  

let  formFecha1 =new Date(formato1Cambio);
let  formFecha2 =new Date(formato2);
let  formFecha3 =new Date(formato3);



function calculoDias(tipoformato, inicioA) {

    let milis=24*60*60*1000;
    let milistranscurridos=Math.abs(tipoformato.getTime()-inicioA.getTime());
    var DiasTranscurridos=Math.round(milistranscurridos/milis)+1;

    return DiasTranscurridos;
}

console.log("Tipo1:"+ formato1);
console.log(formFecha1);

console.log("Tipo2:"+ formato2);
console.log(formFecha2);

console.log("Tipo3:"+ formato3);
console.log(formFecha3);


console.log(calculoDias(formFecha1, date1));
console.log(calculoDias(formFecha2, date1));
console.log(calculoDias(formFecha3, date1));