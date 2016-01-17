$(document).ready(function() {
	var rotate=0;

	objetos = 0; //numero de objetos arrastrables de paleta
	loads = 0; //numero de cargas de archivo SVG
	idLoad = "import"; //se usa para generar un ID para los objetos SVG

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

	//boton se encarga de cargar un archivo SVG
	$('#btnLoad').click(function(){
		idLoads = idLoad+loads;
		svg = $('#txtLoad').val(); //obtengo input del usuario
		$('.canvas').append('<div id="'+idLoads+'"></div>'); //creo el div que envuelve al SVG importado
		$("#"+idLoads).load(svg, function( response, status, xhr ) {
		  	if ( status == "error" ) {
		    	alert("File not found");
		  	}
		}); //cargo SVG en el div
        $("#"+idLoads).addClass("inline");
        $("#"+idLoads).draggable({ //hago arrastrable al SVG
 			containment: 'canvas'
 		});
        loads++;
        $("#"+idLoads).mousedown(function(e){ //SVG desaparece con rueda del mouse
	       	if( e.button == 1 ) { 
	      		$(this).fadeOut();
	      		return false;
	    	} 
	    	return true; 
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
	        $(nombre).addClass("hide"+objetos);
	        $(nombre).addClass("rotate");
	        $(".rotate").click(function(event) {
			    if (event.shiftKey) {
			    	rotate += 90;
			        $(this).rotate(rotate);
			    } 
			});
	    	$(".hide"+objetos).mousedown(function(e){
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
							//$("#clone"+objetos).addClass("hideable"+objetos);
			}
		}
	});


}); 	
 
