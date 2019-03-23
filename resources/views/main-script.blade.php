
// THIS FILE WORKS AS THE MAIN SCRIPT THAT WILL RUN ON THE FRONT END

console.log('omb starts');

var script = document.createElement('script');
script.type = "text/javascript";
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js";
document.getElementsByTagName('head')[0].appendChild(script);


var shopname = "{{$pageData['name']}}";
// var buttonHtml = "{{$pageData['buttonHtml']}}";
var buttonHtml = "{{asset('img/magnifying-glass-search-button.png')}}";

var session_data = "{{session('test-data')}}";

console.log(shopname,session_data);
$('button[name="add"]').css('backgroundColor','indigo');

// console.log(buttonHtml);
$('<span style="background: url('+ buttonHtml +') no-repeat top left; background-size: contain; cursor: pointer; display: inline-block; height: 24px; width: 24px;margin-top: 18px;margin-left: -42px;"></span>').insertAfter($('input[name="q"][type="search"]'));