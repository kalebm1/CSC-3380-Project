

var role = document.getElementById("role").innerHTML;
var list="listener";
var host="host";
console.log(role);
if(role.localeCompare(list)==0){
  listener();
}else{
  hosting();
}


/*
Function for listeners of a host to tweet that they are listening to the host in
to support them.
*/
function listener(){
  var str1 = "I am listening to ";
   var str2 = document.getElementById("name").innerHTML;
   var str3 = " on @wevibet!";
   var res = str1.concat(str2, str3);

twttr.widgets.createShareButton(
  "/",
  document.getElementById("tweet-container"),
  {
    size: "large",
    text: res,
    hashtags: "WeVibe,music",
    via: "wivebet",
    related: "music"
  }
);
twttr.widgets.load();

}

/*
Function for hosts to tweet out to their fanbase to let them know that they are
live on WeVibe
*/
function hosting(){
  var str1 = "I am hosting music";
   var str3 = " on @wevibet!";
   var res = str1.concat(str3);

twttr.widgets.createShareButton(
  "/",
  document.getElementById("tweet-container"),
  {
    size: "large",
    text: res,
    hashtags: "WeVibe,music",
    via: "wivebet",
    related: "music"
  }
);
twttr.widgets.load();


}





















