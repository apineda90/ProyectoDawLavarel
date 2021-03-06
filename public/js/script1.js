// funcion para exportar el contenido html (para el canvas)
function saveHtml(file, id, type) {
    var html = document.getElementById(id).innerHTML;
    var link = document.createElement('a');
    type = type || 'text/plain';
    link.setAttribute('download', file);
    link.setAttribute('href', 'data:' + type + ';charset=utf-8,' + encodeURIComponent(html));
    link.click(); 
}

function Stack(){
	this.stac = new Array();
	
	this.pop=function(){
		return this.stac.pop();
	}
	
	this.push=function(item){
		this.stac.push(item);
	}
}

function Queue(){
	this.stac=new Array();

	this.dequeue=function(){
		return this.stac.pop();
	}

	this.enqueue=function(item){
		this.stac.unshift(item);
	}
}

function estado_current(id,x,y){
	console.log("asdasd");
    $.get( "/graph/" + id, function( data ) {
    	
		$('#'+id).css({top: y+'px', left: x+'px'});

    });
     	
}

$(document).ready(function() {

	$('.dragImport').draggable({
      cancel: "",
      containment: 'parent',
        start:function(ev, ui){ // comienza el drag
            var pos=$(ui.helper).offset();
            ini = [pos.left, pos.top];
            //console.log(ini);
            
        },
        stop:function(ev, ui) { // termina el drag
            var pos=$(ui.helper).offset();
            stack.push([$(this).attr("id"), pos.left, pos.top, ini[0], ini[1]]);
            data = {'id':$(this).attr("id"), 'x':pos.left, 'y':pos.top};
            $.post( "/graph", $(this).serialize(), function( data ) {

   			 });
          }
    });

	document.onkeydown = KeyPress;
	var rotate=0; // variable para rotar los objetos con shift+click
	objetos = 0; // contados de objetos arrastrados al canvas (desde la paleta)

	var i=0;
	// stack undo
	var stack = new Stack();
	// stack redo
	var stack2 = new Stack();
	
	var ini = [0,0];
	var fin = [0,0];

	// ctrl+z y ctrl+y para undo y redo
	function KeyPress(e) {
		var evtobj = window.event? event : e
		if (evtobj.keyCode == 90 && evtobj.ctrlKey){

			var undo = stack.pop();
			var id = undo[0];

			if(undo[1] == "in"){
				$(id).fadeOut();
				stack2.push(undo);
			}
			else if(undo[1] == "out"){
				$(id).fadeIn();
				stack2.push(undo);
			}
			else if(undo[1] == "rot"){
				rotate -= 90;
				$(id).rotate(rotate);
				stack2.push(undo);
			}
			else{
				var left = undo[3];
				var top = undo[4];
				$('#'+id).css({top: top+'px', left: left+'px'});
				stack2.push(undo);
			}
		}
		if (evtobj.keyCode == 89 && evtobj.ctrlKey){

			redo = stack2.pop();
			var id = redo[0];

			if(redo[1] == "out"){
				$(id).fadeOut();
				stack.push([id, "out"]);
			}
			else if(redo[1] == "in"){
				$(id).fadeIn();
				stack.push([id, "in"]);
			}
			else if(redo[1] == "rot"){
				rotate += 90;
				$(id).rotate(rotate);
				stack.push([id, "rot"]);
			}
			else{
				var left = redo[1];
				var top = redo[2];
				$('#'+id).css({top: top+'px', left: left+'px'});
				stack.push(redo);
			}
		}
	}

	$('#expDoc').click(function(){
		html2canvas($("#canvas"), {
            onrendered: function(canvas) {         
                var imgData = canvas.toDataURL(
                    'image/JPEG');              
                var doc = new jsPDF('p', 'mm');
                doc.addImage(imgData, 'JPEG', -67, 10);
                doc.save($('#exportDoc').val());
            }
        });
	});

	// inicializo la paleta
	for (i=0; i<=13; i++){
		$("#objeto"+i).load("svg/"+i+".svg", function( response, status, xhr ) {
		  	if ( status == "error" ) {
		    	alert("File not found");
		  	}
		});
	    $("#objeto"+i).hover(
	        function() { $(this).addClass("Hover"); },
	        function() { $(this).removeClass("Hover"); }
	    );
	}
    $("#loaded").hover(
	        function() { $(this).addClass("Hover"); },
	        function() { $(this).removeClass("Hover"); }
	);

	// guardo el html del canvas en un input
	$('#htmlListo').click(function(){ 
		imports = 0;
		$('.rotate').each(function() {
			// asigno un nuevo id a los objetos guardados (evitar tener mismo id que los de paleta)
		    $(this).attr("id", "imported"+imports);
		    $(this).addClass("import");
		    imports++;
		});
		$('#HTMLCanvas').val($('#canvas').html());
	});
	// guardo el html del canvas en un input
	$('#htmlModif').click(function(){ 
		imports = 0;
		$('.rotate').each(function() {
			// asigno un nuevo id a los objetos guardados (evitar tener mismo id que los de paleta)
		    $(this).attr("id", "imported"+imports);
		    $(this).addClass("import");
		    imports++;
		});
		$('#HTMLCanvasMod').val($('#canvas').html());
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
	    	// accion de ingresar un objeto de la paleta al canvas (stack push)
	    	stack.push([nombre, "in"]);
	       	//cuando objeto se arrastra
	        $(nombre).draggable({
	        	containment: 'parent',
	        	start:function(ev, ui){
		        	var pos=$(ui.helper).offset();
		        	console.log($(this).attr("id"));
		        	ini = [pos.left, pos.top];
		           	console.log("Initial: ["+ini[0]+", "+ini[1]+"]");
	        	},
	            stop:function(ev, ui) { // termino de hacer drag
	            	var outputEl = document.getElementById('client_event_example_log');
	            	var pos=$(ui.helper).offset();
	            	console.log("Final: ["+pos.left+", "+pos.top+"]");
            	 	stack.push([$(this).attr("id"), pos.left, pos.top, ini[0], ini[1]]);
            	 	 $.post( "/graph", data , function( data ) {

   			 		});
	            }
	        });
	        //objeto desaparece cuando aplasto rueda del mouse
	        $(nombre).addClass("hideable"); 
	        $(nombre).addClass("rotate");
        	$(".rotate").click(function(event) {
			    if (event.shiftKey) {
			    	rotate += 90;
			        $(this).rotate(rotate);
    		        var nombre = "#"+$(this).attr("id");
    		        // accion de rotar un objeto (stack push)
      				stack.push([nombre, "rot"]);
			    } 
			});
			$(".hideable").mousedown(function(e){
		       	if( e.button == 1 ) { 
		      		$(this).fadeOut();
		      		var nombre = "#"+$(this).attr("id");
		      		// accion de ocultar un objeto (stack push)
		      		stack.push([nombre, "out"]);
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

	$('.import').addClass("dragImport");
	$('.dragImport').draggable({
		cancel: "",
		containment: 'parent',
	    start:function(ev, ui){ // comienza el drag
        	var pos=$(ui.helper).offset();
        	ini = [pos.left, pos.top];
        	console.log("Initial: ["+ini[0]+", "+ini[1]+"]");
        	
            
	    },
        stop:function(ev, ui) { // termina el drag
        	var pos=$(ui.helper).offset();
        	console.log("Final: ["+pos.left+", "+pos.top+"]");
        	// accion de mover un objeto del canvas (stack push)
        	stack.push([$(this).attr("id"), pos.left, pos.top, ini[0], ini[1]]);
        }
	});
	$('.import').addClass("hideableImport");
	$('.import').addClass("rotateImport");
	$('.import').hover(
        function() { $(this).addClass("Hover"); },
        function() { $(this).removeClass("Hover"); }
    );

  	$(".rotateImport").click(function(event) {
		    if (event.shiftKey) {
		    	rotate += 90;
		        $(this).rotate(rotate);
		        var nombre = "#"+$(this).attr("id");
		        // accion de rotar un objeto (stack push)
      			stack.push([nombre, "rot"]);
		    } 
		});
	$(".hideableImport").mousedown(function(e){
       	if( e.button == 1 ) { 
      		$(this).fadeOut();
      		var nombre = "#"+$(this).attr("id");
      		// accion de ocultar un objeto (stack push)
      		stack.push([nombre, "out"]);
      		return false; 
    	} 
    	return true; 
	});




	
});