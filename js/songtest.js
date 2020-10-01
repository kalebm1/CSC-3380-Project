var song_title;
var artist;
var album;
var song;

/*
Function to search the ReVibe API to get the necessary song data to display
on the website. The function sends a search request for the user inputted
data to the ReVibe API. It then takes the information sent back and displays
either a not found error, or it builds a href with for the user to be able to
add the song to their playlist.
*/
function wack(){

$(document).ready(function() {
		var song = document.getElementById("search_value").value;
		var url = "https://api.revibe.tech/v1/content/search/?text=";
		url = url.concat(song);
		var settings = {
			"url":url,
			"method":"GET",
			"timeout":0,
		//	"dataType":"json",
			"headers": {"Authorization": "Bearer fd1EDDmRL6VsdPV9i7hlzrn2u7G4I31XTDMr4h8C8pcP658wqLg4Zfo0bQMNZjTM"}
		};
	$.ajax(settings).done(function(response){
		if(response.songs.length!==0){
		    console.log("True!");
		    console.log(response.songs[0].title);
		    var x = 0;
		    while(x<response.songs.length){
		     document.getElementById("results").innerHTML = document.getElementById("results").innerHTML + "<a href='http://makwd.us/project/add-to-playlist.php?id="+response.songs[x].song_id+"&uri=https://revibe-media.s3.amazonaws.com/media/audio/songs/"+response.songs[x].song_uri+"/outputs/mp4/medium.mp4&artist="+response.songs[x].uploaded_by.name+"&songname="+response.songs[x].title+"'><div id ='new_response'>"+response.songs[x].title+"<br>"+response.songs[x].uploaded_by.name+/*"<audio controls> <source src='"+response.songs[x].tracks[x].url+"' type='audio/mpeg'> Your browser does not support audio. </audio>"+*/"</div></a>";
		     x=x+1;
		 }
		    
		}else{
		    document.getElementById("results").innerHTML = "NO RESULTS FOUND. PLEASE TRY A DIFFERENT SEARCH TERM.";
		}

		 
	});

});
}


/*
Function to delete the search results to be able to display the new search
results.
*/
function scrub_it(){
    document.getElementById("results").innerHTML=" ";
}

/*
Function to parse the URL to get the parameters passed in it.
*/
function getUrlVars(){
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}


/*
Function used to build the song player seen on the users page. It takes in the
song list from the users playlist and builds the player based on the songs in
the playlist. The builder is provided by the howler.js plugin.
*/

function buildSong(songlist){
   
   
   $(function(){
	var sound = new Howl({
		src: [songlist],
		volume: 0.5
	});

	$("#howler-play").on("click", function(){
		sound.play();
	});

	$("#howler-pause").on("click", function(){
		sound.pause();
	});

	$("#howler-stop").on("click", function(){
		sound.stop();
	});

	$("#howler-volup").on("click", function(){
		var vol = sound.volume();
		vol += 0.1;
		if (vol > 1) {
			vol = 1;
		}
		sound.volume(vol);
	});

	$("#howler-voldown").on("click", function(){
		var vol = sound.volume();
		vol -= 0.1;
		if (vol < 0) {
			vol = 0;
		}
		sound.volume(vol);
	});

   });
   
   
    
}



