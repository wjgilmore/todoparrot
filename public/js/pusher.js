$( document ).ready(function() {

    var pusher = new Pusher('YOUR_PUBLIC_PUSHER_KEY');
    var channel = pusher.subscribe('list-updates');

	channel.bind('Todoparrot\\Events\\ListWasCreated', function(data) {
	  $('#pusher').html('New list created: ' + data.list.name);
	});

});