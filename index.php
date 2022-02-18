<!DOCTYPE html>
<html>
<head>
	<title>Todo App</title>
	<!-- css -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!-- js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<style type="text/css">
		ul li i {
			float: right;
			cursor: pointer;
			padding: 7px;
		}
		ul li i:hover {
			color: rgb(255, 82, 82);
		}
	</style>
</head>
<body>
	<div class="container-fluid m-4">
		<div class="row">
			<div class="col-sm-3 m-2">
				<div class="card">
					<div class="card-header bg-info">
						<h5 class="card-title">New Task List</h5>
					</div>
					<div class="card-body">
						<form>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Add new task" id="newtodo">
								<button class="btn btn-info" type="button" id="addtodo" ><i class="bi bi-plus-lg text-light"></i></button>
							</div>
						</form>
						<ul class="list-group list-group-flush" id="newtodo">
							<!-- Button trigger modal -->
							<li class="list-group-item">An item</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-3 m-2">
				<div class="card">
					<div class="card-header bg-info">
						<h5 class="card-title">Inprogress Task List</h5>
					</div>
					<div class="card-body">

						<ul class="list-group list-group-flush" id="inprogress">
							<!-- Button trigger modal -->
							<li class="list-group-item">An item</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-3 m-2">
				<div class="card">
					<div class="card-header bg-info">
						<h5 class="card-title">Completed Task List</h5>
					</div>
					<div class="card-body">

						<ul class="list-group list-group-flush" id="completed">
							<!-- Button trigger modal -->
							<li class="list-group-item">An item</li>

						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card">
					<div class="card-header bg-info">
						<h5 class="card-title">Archive Task List</h5>
					</div>
					<div class="card-body">

						<ul class="list-group list-group-flush" id="archived">
							<!-- Button trigger modal -->
							<li class="list-group-item">An item</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="totoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="todoname">An Item</h5>&nbsp;&nbsp;
					<span class="badge bg-warning" id="taskstatusshow"></span>

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<p>Created On&nbsp;:<span id="date"></span></p>
						<div class="col-sm-8">
							<label class="form-label">Add Task Description</label>
							<textarea class="form-control" id="tododescription">Task Description</textarea>
							<input type="hidden" name="" id="todoindex">
							<hr>
							<h5 class="sub-title">Checklist</h5>
							<form class="form-inline">
								<div id="checklist">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="check1" name="checkitem" value="something">
										<label class="form-check-label" for="check1">Sub task 1</label>
									</div>
								</div>

								<div class="form-group">
									<input type="text" name="checkitem_value" id="checkitem_value" class="form-control">
								</div>
								<div class="form-group pt-2">
									<button class="btn btn-primary btn-sm" id="addcheckitem">Add</button>
								</div>
								
							</form>
	      			<!-- <hr>
	      			<h5 class="card-title">Activity</h5>
	      			<hr>
	      			<ul class="list-group list-group-flush" id="todoactivity">
	      			  <li class="list-group-item">A first Activity <small>on Date Time</small></li>
	      			</ul> -->

	      		</div>
	      		<div class="col-sm-4">
	      			<label class="form-label">Move Task</label>
	      			<select class="form-select" id="todostatus">
	      				
	      				<option value="new" selected>New</option>
	      				<option value="inprogress">In Progress</option>
	      				<option value="completed">Completed</option>
	      			</select>
	      			
	      		</div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	      	<button type="button" class="btn btn-primary" id="updatetodo">Update</button>
	      </div>
	  </div>
	</div>
</div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>