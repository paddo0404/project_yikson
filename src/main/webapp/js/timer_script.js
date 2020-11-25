
function display_c(start){

window.start = parseFloat(start);

var end = 0 

var refresh=1000; 

if(window.start >= end ){

mytime=setTimeout('display_ct()',refresh)

}

else {

//window.location = "index.php";
window.location.reload();

}

}



function display_ct() {

var days=Math.floor(window.start / 86400);

var hours = Math.floor((window.start - (days * 86400 ))/3600)

if(hours<10)

hours="0"+hours;

var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)

if(minutes<10)

minutes="0"+minutes;

var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))

if(secs<10)

secs="0"+secs;



var x = hours + ":" + minutes + ":" + secs ;



document.getElementById('ct').innerHTML = x;

window.start= window.start- 1;

tt=display_c(window.start);

}

function updateClock ( )

{

  var currentTime = new Date ( );



  var currentHours = currentTime.getHours ( );

  var currentMinutes = currentTime.getMinutes ( );

  var currentSeconds = currentTime.getSeconds ( );



  // Pad the minutes and seconds with leading zeros, if required

  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;

  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;



  // Choose either "AM" or "PM" as appropriate

  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";



  // Convert the hours component to 12-hour format if needed

  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;



  // Convert an hours component of "0" to "12"

  currentHours = ( currentHours == 0 ) ? 12 : currentHours;



  // Compose the string for display

  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;



  // Update the time display

  document.getElementById("clock").firstChild.nodeValue = currentTimeString;

}
