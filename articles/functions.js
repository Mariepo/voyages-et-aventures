function autoParagraph(text){
    return '<p>' + text.split( /\n+/ ).join( '</p>\n<p>' ) + '</p>';
}

