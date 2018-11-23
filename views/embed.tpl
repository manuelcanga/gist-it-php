if ( 'prettyPrint' in window ) {} else {
    document.write( '<script type="text/javascript" src="{{host}}/assets/prettify/prettify.js"></script>' );
}

document.write( '<link rel="stylesheet" href="{{host}}/assets/embed.css"/>' );

document.write( '<link rel="stylesheet" href="{{host}}/assets/prettify/prettify.css"/>' );

document.write( '{{code}}' );

document.write( '<script type="text/javascript">prettyPrint();</script>' );