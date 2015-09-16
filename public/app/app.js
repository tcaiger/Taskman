angular.module("taskApp", ['ngResource'])

.controller('Controller',function($scope, $resource) {

	// ========= USERS =================
 	
 	var User  = $resource('/api/users/:id');

	// ====================================
	// Read users from database
	// ====================================

	$scope.users = User.query();

	// ========= LISTS =================
 	
 	var Lst  = $resource('/api/lists/:id');

	// ====================================
	// Read lists from database
	// ====================================

	$scope.lists = Lst.query();


	// ====================================
	// Create a new list in the database
	// ===================================
	
	$scope.addList = function (newList) {
		
		var list = new Lst();
		
		list.name = newList.name;
		console.log('add list', list);
		list.$save(function(){
			console.log('success');
			$scope.lists.push(list);
			newList.name = "";
		}); 
	};

	// ====================================
	// Update a list in the database
	// ===================================
	
	$scope.updateList = function (update) {

		update.hide = false;
		var list = new Lst();
		list.id = update.id;
		list.name = update.name;
		list.$save({id: update.id});
	};

	// ====================================
	// Delete a list in the database (soft delete)
	// ===================================
	
	$scope.deleteList = function (remove) {

		var response = confirm('Are you sure you want to delete this list?');

		if (response === true) {
	        var list = new Lst();
			list.id = remove.id;
			list.deleted = '1';
			list.$remove({id: remove.id});
			var i = $scope.lists.indexOf(remove);
			$scope.lists.splice(i,1);
	    }
		
	};

	// ========= TASKS ===============
 	
 	var Task  = $resource('/api/tasks/:id');

	// ====================================
	// Read tasks from database
	// ====================================

	$scope.tasks = Task.query();

	// ====================================
	// Create a new task in the database
	// ===================================
	
	$scope.addTask = function (newTask, list) {

		var task 	 		= new Task();
		task.name 	 		= newTask.name;
		task.list_id 		= list.id;
		task.description 	= 'Click to add a description';
		task.$save(function(){

			$scope.tasks.push(task);
			newTask.name = "";
		}); 
	};

	// ====================================
	// Update a task in the database
	// ===================================
	
	$scope.updateTask = function (update) {

		var task = new Task();	
		task.id = update.id;
		if (update.name) {

			update.hide = false;
			task.name = update.name;
		}
		if (update.description) {

			update.Dhide = false;
			task.description = update.description;
		}
		
		task.$save({id: update.id});
	};

	// ====================================
	// Delete a task in the database (soft delete)
	// ===================================
	
	$scope.deleteTask = function (remove) {

		var response = confirm('Are you sure you want to delete this task?');

		if (response === true) {
			var task = new Task();
			task.id = remove.id;
			task.deleted = '1';
			task.$remove({id: remove.id});
			var i = $scope.tasks.indexOf(remove);
			$scope.tasks.splice(i,1);
		}
	};

	// ========= MOVING TASKS =================

	$scope.moveLeft = function (update) {

		// var task = new Task();
		// task.id = update.id;
		// task.list_id = xyz;
		// console.log('move left');
		 
	};

	$scope.moveRight = function (update) {
		console.log('move right');
		 
	};

	// ========= COMMENTS =================
 	
 	var Comment  = $resource('/api/comments/:id');

	// ====================================
	// Read comments from database
	// ====================================

	$scope.comments = Comment.query();

	// ====================================
	// Create a new comment in the database
	// ===================================
	
	$scope.addComment = function (newComment, task) {

		var comment 	 = new Comment();
		comment.content  = newComment.content;
		comment.task_id  = task.id;
		comment.user_id	 = 1;
		comment.time 	 = moment().format('YYYY-MM-DD HH:mm:ss');
		comment.$save(function(){

			$scope.comments.push(comment);
			newComment.content = "";
		}); 
	};
});




