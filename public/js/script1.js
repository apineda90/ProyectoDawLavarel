// funcion para exportar el contenido html (para el canvas)
function saveHtml(file, id, type) {
    var html = document.getElementById(id).innerHTML;
    var link = document.createElement('a');
    type = type || 'text/plain';
    link.setAttribute('download', file);
    link.setAttribute('href', 'data:' + type + ';charset=utf-8,' + encodeURIComponent(html));
    link.click(); 
}

$(document).ready(function() {
	var rotate=0; // variable para rotar los objetos con shift+click
	objetos = 0; // contados de objetos arrastrados al canvas (desde la paleta)

	var i=0;
	for (i=0; i<=13; i++){
		$("#objeto"+i).load("svg/"+i+".svg", function( response, status, xhr ) {
		  	if ( status == "error" ) {
		    	alert("File not found");
		  	}
		}); //cargo SVG en el div
	    $("#objeto"+i).hover(
	        function() { $(this).addClass("Hover"); },
	        function() { $(this).removeClass("Hover"); }
	    );
	}
    $("#loaded").hover(
	        function() { $(this).addClass("Hover"); },
	        function() { $(this).removeClass("Hover"); }
	);

    // descargo un archivo con el contenido del canvas
	$('#btnGuardar').click(function(){
		imports = 0;
		$('.rotate').each(function() {
			// asigno un nuevo id a los objetos guardados (evitar tener mismo id que los de paleta)
		    $(this).attr("id", "imported"+imports);
		    imports++;
		});
		archivo = $('#saveDoc').val();
		console.log(archivo);
		if(archivo == ""){
			archivo = "grafico";
		}
		console.log(archivo);
		
		saveHtml(archivo+".svg", 'canvas','text/html');
	});

	// guardo el html del canvas en un input
	$('#htmlListo').click(function(){ 
		$('#HTMLCanvas').val($('#canvas').html());
		console.log($('#HTMLCanvas').val());
		console.log("HTML CARGADO");
	});

	//boton se encarga de cargar en el canvas
	$('#btnCargar').click(function(){
		svg = $('#loadDoc').val(); //obtengo input del usuario
		$('.canvas').load("/"+svg+".svg", function( response, status, xhr ) {
			// asigno las clases para arrastrar, esconder, rotar y hover a los objetos importados
			for(i=0; i<1000; i++){
				$('#imported'+i).addClass("drag");
				$('.drag').draggable({
					cancel: "",
		    		containment: 'parent'
		    	});
				$('#imported'+i).addClass("hideable");
				$('#imported'+i).addClass("rotate");
				$('#imported'+i).hover(
			        function() { $(this).addClass("Hover"); },
			        function() { $(this).removeClass("Hover"); }
			    );
			}
		  	if ( status == "error" ) {
		    	alert("File not found");
	  		}
		  	$(".rotate").click(function(event) {
				    if (event.shiftKey) {
				    	rotate += 90;
				        $(this).rotate(rotate);
				    } 
				});
			$(".hideable").mousedown(function(e){
		       	if( e.button == 1 ) { 
		      		$(this).fadeOut();
		      		return false; 
		    	} 
		    	return true; 
			}); 
		}); 
    });

 	//clase drag hace a los elementos arrastrables
  	$('.drag').draggable( {
  		cancel: "",
	    containment: 'canvas', //solo son arrastrables dentro del canvas
	    helper: 'clone', //se genera un clon al arrastrar de la paleta
	    start:function(ev, ui){
	    	$("#sidebar-wrapper").removeClass("overflowy");
	    },
	    stop:function(ev, ui) {
	    	var pos=$(ui.helper).offset();
	    	nombre = "#clone"+objetos; //genero un ID para los clones arrastrables
	    	console.log(nombre);
	    	$(nombre).css({"left":pos.left,"top":pos.top});
	    	$(nombre).removeClass("drag");
	       	//cuando objeto se arrastra
	        $(nombre).draggable({
	        	containment: 'parent',
	            stop:function(ev, ui) {
	            	var pos=$(ui.helper).offset();
	            	console.log($(this).attr("id"));
					console.log(pos.left)
	                console.log(pos.top)
	            }
	        });
	        //objeto desaparece cuando aplasto rueda del mouse
	        $(nombre).addClass("hideable"); 
	        $(nombre).addClass("rotate");
        	$(".rotate").click(function(event) {
			    if (event.shiftKey) {
			    	rotate += 90;
			        $(this).rotate(rotate);
			    } 
			});
			$(".hideable").mousedown(function(e){
		       	if( e.button == 1 ) { 
		      		$(this).fadeOut();
		      		return false; 
		    	} 
		    	return true; 
			}); 
	    }
	});

  	//hace que el canvas admita objetos arrastrables
	$(".canvas").droppable({
		cancel: "",
		drop: function(ev, ui) {
			console.log(ui.helper);
			if (ui.helper.attr('id').search(/objeto[0-9]/) != -1){
				objetos++;
				var element=$(ui.draggable).clone();
				element.addClass("tempclass");
				$(this).append(element);
				$(".tempclass").attr("id","clone"+objetos);
				$("#clone"+objetos).removeClass("tempclass");
				draggedNumber = ui.helper.attr('id').search(/objeto([0-9])/)
				itemDragged = "dragged" + RegExp.$1
				$("#clone"+objetos).addClass(itemDragged);
				$("#clone"+objetos).addClass("absolute");
			    $("#clone"+objetos).hover(
			        function() { $(this).addClass("Hover"); },
			        function() { $(this).removeClass("Hover"); }
			    );
			}
		}
	});
});