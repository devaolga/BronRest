function lettersOnly(evt)
{
    validate(evt, /^[a-zA-ZäöüÄÖÜ ._-]+$/i );
}

function telephoneOnly(evt)
{
    validate(evt, /^([0-9\(\)\/\+ \-]*)$/ );  
}

function validate(evt, regex)
{
    var key = evt.keyCode || evt.which;
    key = String.fromCharCode( key );   
    if(regex.test(key)) {
        evt.returnValue = true;
    }
    else
    {
        evt.returnValue = false;
    }
}