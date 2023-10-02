/* 
    * Author: Maher
    * Date: Oct 01 2023
    * Name: main.js
    * Description: this javascript file sends ajax request and handles server's responses.
*/

var xmlHttp;  //XMLHttpRequest object

//when the browser finishes loading the web page, execute the following code
window.onload = function () {
    // create a XMLHttpRequest object compatible to most browsers
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else {
        alert("Error creating the XMLHttpRequest object.");
        xmlHttp = false;
    }
    return xmlHttp;
};

/*
 * this function sends AJAX request and handles server's responses.
 */
function calculate() {

    // Retrieving Radius & Height
    var radius = document.getElementById("radius").value;
    var height = document.getElementById("height").value;

    xmlHttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText != ''){         // if the response is not empty do the next block on code
                // instantiate js object from the JSON format response
                var dataObj = JSON.parse(this.responseText);
                // assigning response data to the divs
                base.innerHTML = dataObj['Base'];
                volume.innerHTML = dataObj['Volume'];
                lateral.innerHTML = dataObj['Lateral'];
                surface.innerHTML = dataObj['Surface'];
            }else{                              // if the response is empty
                // empty the result divs
                base.innerHTML = "";
                volume.innerHTML = "";
                lateral.innerHTML = "";
                surface.innerHTML = "";
            }
        }
    }


    xmlHttp.open("GET", "cylinder.php?radius=" + radius + "&height=" + height); // Iniializes new request
    xmlHttp.send(); // Sends the request to the server
}