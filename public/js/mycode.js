$(function() {
	var formCreate = new Vue({
	  el: '#tasks',
	  data: {
	  	ajaxRequest: false,
	  	taskInfo: {
	  	  name: '',
	  	  due: '',
	  	  done: ''
	    },
	    listId: '',
	    tasks: [],
	    errors: []
	  },
	  ready: function() {
	  	
	  	Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');

	  	// Retrieve the list ID via the form's data-id attribute
		var taskForm = document.getElementById('task-creation-form');
		this.listId = taskForm.getAttribute('data-id');

		this.retrieveTasks();

	  },
  	  methods: {

  	  	submitTask: function(e) {
  	  		
  	  		this.ajaxRequest = true;
  	  		
  	  		this.$http.post('http://dev.todoparrot.com:8002/lists/' + this.listId + '/tasks', this.taskInfo).then(function(response) {
  	  			document.getElementById('ajax-response').innerHTML = response.data.message;
  	  			this.tasks.push(this.taskInfo);
  	  			this.taskInfo = { name: '', due: '', done: '' };
  	  		}).catch(function(error) {

  	  			this.errors = error.data;
  	  			document.getElementById('ajax-response').innerHTML = "Errors:";

  	  		});
  	  	},

  	  	retrieveTasks: function(e) {

			this.$http.get('http://dev.todoparrot.com:8002/lists/' + this.listId + '/tasks')
				.then(function(response) {
					this.tasks = response.data.tasks;
			})
				.catch(function(error) {
					document.getElementById('task-list').innerHTML = 'Could not retrieve tasks';
			});

  	  	}

  	  }
	});

});