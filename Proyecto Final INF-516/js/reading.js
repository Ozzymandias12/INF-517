// Leer el archivo Json y crear la tabla dinamicamente.
function appendBody(json) {
 
    for (let i = 0; i < json.length; i++) {
        curso = json[i].nombre;
        fullRowStr = `<tr><th colspan="6" class="bg-light"><i class="fas fa-tasks"></i> ${curso}</th></tr>`;
        $('#tb_cali').find('tbody').append(fullRowStr);

        // Agregar las tareas.
        for (let j = 0; j < json[i].tareas.length; j++) {
            tarea = json[i].tareas[j];

            fullRowStr = "<tr>";
            fullRowStr+= `<th><a href="#" class="text-secondary">${tarea.nombre}</a></th>`;
            
            fullRowStr+= `<td>${tarea.fecha}</td>`;
            fullRowStr+= `<td>${tarea.rango}</td>`;

            estClass=tarea.estado == 'finalizado'?'primary':'warning';
            fullRowStr+= `<td><span class="badge badge-${estClass}">${tarea.estado}</span></td>`;
            
            estClass = tarea.puntuacion >= 70 ? 'success' : 'danger';
            fullRowStr+= `<td><span class="badge badge-${estClass}">${tarea.puntuacion}</span></td>`;
            
            fullRowStr+= `<td>${tarea.comentario}</td>`;
            fullRowStr+= "</tr>";

            $('#tb_cali').find('tbody').append(fullRowStr);
        }
    }
}

// Imprimer la tabla de las calificaciones.
function printData()
{
   var divToPrint=document.getElementById("tb_cali");
   newWin= window.open("","","width=900,height=700");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}