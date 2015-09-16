
<div class="modal fade" id="{{ task.id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">{{ task.name }}</h3>
      </div>

      <!-- ============= -->
      <!-- MODAL BODY-->
      <!-- ============= -->
      <div class="modal-body">
        <h4><strong>Description</strong></h4>
        <div class="description-container">
          <textarea class="form-control" ng-model="task.description" ng-show="task.Dhide == true" ng-blur="updateTask(task)" cols="50" rows="3"></textarea>
       	  <p class="task-description" ng-hide="task.Dhide ==true" ng-click="task.Dhide = true">{{ task.description }}</p>
        </div>
        <hr>

          <!-- ============= -->
		      <!-- COMMENTS-->
		      <!-- ============= -->
        <h4><strong>Comments</strong></h4>
        <div class="comments-container" ng-repeat="comment in comments|filter:{task_id:task.id}:true">  
          <div class="comment flex flex-j-start flex-a-start" ng-repeat="user in users|filter:{id:1}">
			      <div class="comment-img">
              <img src="{{ user.profile }}">
			      </div>
            <div class="comment-content">
              <p class="time">{{ user.name }}, {{ comment.time | date:'medium'}}</p>
              <p>{{ comment.content }}</p>
            </div>
          </div>
        </div>

        <!-- ============= -->
        <!-- ADD COMMENTS-->
        <!-- ============= -->
        <p><strong>Add a Comment</strong></p>
        <textarea class="form-control" placeholder="Add a comment" ng-model="newComment.content"></textarea>
        <button class="btn btn-success" ng-click="addComment(newComment, task)">add</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div> 
  </div> 
</div>