

let monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre','Octubre', 'Noviembre', 'Diciembre'];

let currentDate = new Date();
let currentDay = currentDate.getDate();
let monthNumber = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

let dates = document.getElementById('dates');
let month = document.getElementById('month');
let year = document.getElementById('year');

let prevMonthDOM = document.getElementById('prev-month');
let nextMonthDOM = document.getElementById('next-month');

let TAREAS=[];

month.textContent = monthNames[monthNumber];
year.textContent = currentYear.toString();


prevMonthDOM.addEventListener('click', ()=>lastMonth());
nextMonthDOM.addEventListener('click', ()=>nextMonth());

$.ajax({
    url: 'http://localhost/Prog3/getTareas.php',
    dataType:"json",
	success: function(respuesta) {
        TAREAS=respuesta;
        writeMonth(monthNumber, respuesta); 
	},
	error: function() {
        console.log("No se ha podido obtener la información");
    }
});


function writeMonth(month, tareas=null){
    var f=new Date();
    console.log(tareas);
    for(let i = startDay(); i>0;i--){
        dates.innerHTML += ` <div class="calendar__date calendar__item calendar__last-days">
            ${getTotalDays(monthNumber-1)-(i-1)}
        </div>`;
    }

    
    var tarea="";
    for(let i=1; i<=getTotalDays(month); i++){
        
        tarea="";
        
      if(tareas){
        for(let j of tareas){
            
            if(i==j.Day && month==f.getMonth()){
                tarea+=j.Tarea+"<br>";
                
            }
        }
      }
        if(i===currentDay && month==f.getMonth()) {
           
            dates.innerHTML += `<div class="New calendar__date calendar__item calendar__today"><h8 href="#">${i} <br> </h8><a href="#">${tarea}</a></div>`;
            
        }else{
            dates.innerHTML += `<div class="New calendar__date calendar__item">${i}<br> <a href="#">${tarea}</a></div>`;
        }
    }
}

function getTotalDays(month){
    if(month === -1) month = 11;

    if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
        return  31;

    } else if (month == 3 || month == 5 || month == 8 || month == 10) {
        return 30;

    } else {

        return isLeap() ? 29:28;
    }
}

function isLeap(){//Saber si es bisiesto
    return ((currentYear % 100 !=0) && (currentYear % 4 == 0) || (currentYear % 400 == 0));
}

function startDay(){//Devolver el dia que empieza el mes
    let start = new Date(currentYear, monthNumber, 1);
    return ((start.getDay()-1) === -1) ? 6 : start.getDay()-1;
}

function lastMonth(){
    if(monthNumber !== 0){
        monthNumber--;
    }else{
        monthNumber = 11;
        currentYear--;
    }

    setNewDate();
}

function nextMonth(){
    if(monthNumber !== 11){
        monthNumber++;
    }else{
        monthNumber = 0;
        currentYear++;
    }

    setNewDate();
}

function setNewDate(){
    currentDate.setFullYear(currentYear,monthNumber,currentDay);
    month.textContent = monthNames[monthNumber];
    year.textContent = currentYear.toString();
    dates.textContent = '';
    writeMonth(monthNumber, TAREAS);
}
