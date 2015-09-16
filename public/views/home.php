<?php  Auth::kickout('signin'); ?>

<?php  include "header.php";?>

<h2><small>Your Project</small></h2>

<div class="lists-container flex flex-a-start flex-j-start" ng-controller="Controller">
	
	<div class="list well" ng-repeat="list in lists">

		<!-- ============= -->
		<!-- LISTS-->
		<!-- ============= -->
		<span class="destroy-list" ng-click="deleteList(list)">&times;</span>
		<input type="text" ng-model="list.name" ng-show="list.hide == true" ng-blur="updateList(list)">
		<strong class="list-name" ng-hide="list.hide == true" ng-click="list.hide = true">{{ list.name }}</strong>
		
		<div class="tasks-container" ng-repeat="task in tasks | filter:{list_id:list.id}:true">

			<!-- ============= -->
			<!-- TASK CARDS-->
			<!-- ============= -->
			<div class="task-card">
				<input type="text" ng-model="task.name" ng-show="task.hide == true" ng-blur="updateTask(task)">
				<p class="task-name" ng-hide="task.hide == true">{{ task.name }}</p>

				<!-- ============= -->
				<!-- MODALS-->
				<!-- ============= -->
				<?php  include "modal.php";?>

				<div class="task-icons">
					<span><span class="glyphicon glyphicon-trash" aria-hidden="true" ng-click="deleteTask(task)"></span></span>
					<span ng-click="task.hide = true"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
					<span data-toggle="modal" data-target="#{{ task.id }}"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <span class="counter">0</span></span>
					<span ng-click="moveLeft(task)"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></span>
					<span ng-click="moveRight(task)"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></span>
				</div>
			</div>
		</div>

		<!-- ============= -->
		<!-- Add New Task -->
		<!-- ============= -->
		<div class="new-task">
			<input type="text" class="form-control"  ng-model="newTask.name" placeholder="Add a task">
			<button ng-click="addTask(newTask, list)"class="btn btn-primary" >Add</button>
		</div>	
	</div>

	<!-- ============= -->
	<!-- Add New List  -->
	<!-- ============= -->
	<div class="list well add-list">
		<input type="text" class="form-control" placeholder="Add a list" ng-model="newList.name">
		<button ng-click="addList(newList)"class="btn btn-primary" >Add</button>
	</div>
</div>

<?php  include "footer.php";?>

		
		

	
	