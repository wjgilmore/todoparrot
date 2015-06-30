$( document ).ready(function() {

    var pusher = new Pusher('8943ce04cde9a06a18d1');
    var channel = pusher.subscribe('list-updates');

	channel.bind('Todoparrot\\Events\\ListWasCreated', function(data) {
	  //$('#pusher').html(data.message);
	  alert(data.message);
	});

});

// $(window).on('beforeunload', function(){
//     socket.close();
// });