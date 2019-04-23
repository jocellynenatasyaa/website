function buatajax(){
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    return null;
}
function loadLandingPage(){
    url = "ajaxcontent/landing.php";
    url = url + "?sid="+Math.random();
    load = buatajax();
    load.onreadystatechange = function(){
        if(load.readyState == 4){
            data = load.responseText;
                document.getElementById('ajaxContent').innerHTML = data;
        }
    }
    load.open("GET",url,true);
    load.send();
}
function loadCartPage(){
    url = "ajaxcontent/cart.php";
    url = url + "?sid="+Math.random();
    load = buatajax();
    load.onreadystatechange = function(){
        if(load.readyState == 4){
            data = load.responseText;
                document.getElementById('ajaxContent').innerHTML = data;
        }
    }
    load.open("GET",url,true);
    load.send();
}
function loadBeliPage(){
    url = "ajaxcontent/beli.php";
    url = url + "?sid="+Math.random();
    load = buatajax();
    load.onreadystatechange = function(){
        if(load.readyState == 4){
            data = load.responseText;
                document.getElementById('ajaxContent').innerHTML = data;
        }
    }
    load.open("GET",url,true);
    load.send();
}