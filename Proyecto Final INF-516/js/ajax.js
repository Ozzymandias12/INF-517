$.ajax({
	url: 'https://reqres.in/api/users',
	success: function(respuesta) {
        console.log(respuesta);
        var doc = document.getElementById("users")
        var childs=[]
        for(let i of respuesta.data){
            childs.push(document.createElement("h4"))
            childs[childs.length-1].innerText=i.first_name
            doc.appendChild(childs[childs.length-1])
        }
	},
	error: function() {
        console.log("No se ha podido obtener la información");
    }
});




