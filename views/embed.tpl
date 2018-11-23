if ( 'prettyPrint' in window ) {} else {
    document.write( '<script type="text/javascript" src="/assets/prettify/prettify.js"></script>' );
}

document.write( '<link rel="stylesheet" href="/assets/embed.css"/>' );

document.write( '<link rel="stylesheet" href="/assets/prettify/prettify.css"/>' );

document.write( '{{code}}' );

document.write( '<script type="text/javascript">prettyPrint();</script>' );