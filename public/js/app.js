$('.carousel').carousel({
    interval: 2000
})


$('.select2').select2({
	placeholder: "Seleccione una opción",
	allowClear: true,
	language: {
		noResults: function () {
			return "No hay resultados encontrados!";
		}
	}
});

$('.datetimepicker3').datetimepicker({
	format: 'LT'
});

//scroll to top
$(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
        $('.scrollup').fadeIn();
    } else {
        $('.scrollup').fadeOut();
    }
});
$('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
});


/*
//Videollamada
var connection = new RTCMultiConnection();

connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/'; //servidor de nodejs gratuito para RTCMultiConnection

connection.session = {
	audio: true,
	video: true
};

connection.sdpConstraints.mandatory = {
	OfferToReceiveAudio: true,
	OfferToReceiveVideo: true
};

var localvideoscontainer = document.getElementById('local-videos-container');
var remotevideoscontainer = document.getElementById('remote-videos-container');

connection.onstream = function (event) {
	var video = event.mediaElement;
	
	if (event.type === "local") {
		localvideoscontainer.appendChild( video );
	}

	if (event.type === "remote") {
		remotevideoscontainer.appendChild( video );
	}
};

var roomid = document.getElementById('txt-roomid');

roomid.value = (Math.random() * 1000).toString().replace('.','');

document.getElementById('btn-open-or-join-room').onclick = function () {
	this.dissabled = true;
	connection.openOrJoin(roomid.value || 'predefined-roomid');
}

document.getElementById('btn-close').onclick = function () {
	this.dissabled = true;
  //connection.closeEntireSession();
  // stop all local cameras
  connection.attachStreams.forEach(function(localStream) {
  	localStream.stop();
  });

    // close socket.io connection
    connection.close();
}


*/
