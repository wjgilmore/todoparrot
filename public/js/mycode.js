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
	    tasks: []
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
  	  		e.preventDefault();
  	  		this.ajaxRequest = true;
  	  		var taskInfo = this.taskInfo;
  	  		
  	  		var that = this;

  	  		this.$http.post('http://dev.todoparrot.com:8002/lists/' + this.listId + '/tasks', taskInfo).then(function(response) {
  	  			document.getElementById('ajax-response').innerHTML = response.data.message;
  	  			that.tasks.push(taskInfo);
  	  			that.taskInfo = { name: '', due: '', done: '' };
  	  		}).catch(function(error) {
  	  			document.getElementById('ajax-response').innerHTML = error.data.message;
  	  		});
  	  	},

  	  	retrieveTasks: function(e) {

  	  		var that = this;

			this.$http.get('http://dev.todoparrot.com:8002/lists/' + this.listId + '/tasks')
				.then(function(response) {
					that.tasks = response.data.tasks;
			})
				.catch(function(error) {
					document.getElementById('task-list').innerHTML = 'Could not retrieve tasks';
			});

  	  	}

  	  }
	});

});