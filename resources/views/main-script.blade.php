
// THIS FILE WORKS AS THE MAIN SCRIPT THAT WILL RUN ON THE FRONT END

console.log('omb starts');

var script = document.createElement('script');
script.type = "text/javascript";
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js";
document.getElementsByTagName('head')[0].appendChild(script);


var shopname = "{{$name}}";

var session_data = "{{session('test-data')}}";

console.log(shopname,session_data);
$('button[name="add"]').css('backgroundColor','indigo');