( function( $, pusher, estado_current ) {

var itemActionChannel = pusher.subscribe( 'posicion' );

itemActionChannel.bind( "App\\Events\\ObjetoMovido", function( data ) {

    estado_current( data.id , data.x, data.y );
} );

} )( jQuery, pusher, estado_current);