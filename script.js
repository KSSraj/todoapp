loadnewtodos();
loadinprogresstodos();
loadcompletedtodos();
archivedtodos();
function loadnewtodos() {
	
	let todolist = localStorage.getItem("todolist");

	if (todolist == null) {
		todolist = [];
	} else {

		todolist = JSON.parse(todolist);
	}
	// console.log(todo.status);
	let html = "";

	todolist.forEach((todo, index) => {
		if(todo.status=="new" && todo.checkitems.length==0)
			html +=  `<li class="list-group-item">${todo.name}<i class="bi bi-pencil" onclick="editTodo(${index})"></i><i class="bi bi-trash" onclick="removeTodo(${index})"></i></li>`;

	});

	$("ul#newtodo").empty().append(html);

}


function loadinprogresstodos() {
	
	let todolist = localStorage.getItem("todolist");

	if (todolist == null) {
		todolist = [];
	} else {

		todolist = JSON.parse(todolist);
	}
	// console.log(todo.status);
	let html = "";

	todolist.forEach((todo, index) => {
		if(todo.checkitems.length>0 && todo.status=='new')
			todo.status="inprogress";
		if(todo.status=="inprogress")
			html +=  `<li class="list-group-item">${todo.name}<i class="bi bi-pencil" onclick="editTodo(${index})"></i><i class="bi bi-trash" onclick="removeTodo(${index})"></i></li>`;

	});

	$("ul#inprogress").empty().append(html);

}

function loadcompletedtodos() {
	
	let todolist = localStorage.getItem("todolist");

	if (todolist == null) {
		todolist = [];
	} else {

		todolist = JSON.parse(todolist);
	}
	// console.log(todo.status);
	let html = "";

	todolist.forEach((todo, index) => {

		if(todo.status=="completed" && index<10 )
			html +=  `<li class="list-group-item">${todo.name}<i class="bi bi-pencil" onclick="editTodo(${index})"></i><i class="bi bi-trash" onclick="removeTodo(${index})"></i></li>`;

	});

	$("ul#completed").empty().append(html);

}
function archivedtodos() {
	
	let todolist = localStorage.getItem("todolist");

	if (todolist == null) {
		todolist = [];
	} else {

		todolist = JSON.parse(todolist);
	}
	// console.log(todo.status);
	let html = "";

	todolist.forEach((todo, index) => {

		if(todo.status=="completed" && index>=10)
			html +=  `<li class="list-group-item">${todo.name}<i class="bi bi-pencil" onclick="editTodo(${index})"></i><i class="bi bi-trash" onclick="removeTodo(${index})"></i></li>`;

	});

	$("ul#archived").empty().append(html);

}
$("#addtodo").on('click',
	function (){

		let todolist = JSON.parse(localStorage.getItem("todolist")) || [];
		todolist.push({
			name:$("#newtodo").val(),
			description:"",
			date:new Date(),
			status:"new",
			checkitems:[]
			
		});
		localStorage.setItem("todolist",JSON.stringify(todolist));
		$("#newtodo").val("");
		loadnewtodos();
		loadinprogresstodos();
		
	})

function removeTodo(index){

	let todolist = JSON.parse(localStorage.getItem("todolist"));
	todolist.splice(index, 1);
	localStorage.setItem("todolist", JSON.stringify(todolist));

	loadnewtodos();
	loadinprogresstodos();

}

function editTodo(index){

	$("#todoindex").val(index);

	let todolist = JSON.parse(localStorage.getItem("todolist"));

	$("#todoname").text(todolist[index].name);
	$("#date").text(todolist[index].date);
	$("#taskstatusshow").text(todolist[index].status);
	
	$("#tododescription").text(todolist[index].description);

	let checkitemlist=todolist[index].checkitems||{};

	let checkitems='';

	checkitemlist.forEach((checkitem, index) => {
		
		checkitems += `<div class="form-check">
		<input type="checkbox" class="form-check-input" id="check${index}" name="checkitem" value="${checkitem.text}" ${checkitem.checked}>
		<label class="form-check-label" for="check1">${checkitem.text}</label>
		</div>`;
	});

	$("#checklist").empty().append(checkitems);
	$('#totoModal').modal('show');
	
}

$("#updatetodo").on('click',function(){

	let todolist = JSON.parse(localStorage.getItem("todolist"));

	let todoindex=$("#todoindex").val();

	todolist[todoindex].description=$("#tododescription").val();
	todolist[todoindex].status=$("#todostatus").val();
	
	todolist[todoindex].checkitems=[];
	
	$('input[name=checkitem]').map(function() {
     	
     	let checked = ($(this).prop('checked'))?"checked":"";

	   	todolist[todoindex].checkitems.push({text:$(this).val(),checked:checked});
	
	});

	
	
	localStorage.setItem("todolist", JSON.stringify(todolist));
	//console.log(sample);

	loadnewtodos();
	loadinprogresstodos();
	loadcompletedtodos();
	
});

$("#addcheckitem").on('click',function(e){

	e.preventDefault();
	checkitems='';
	let text=$("#checkitem_value").val();

	checkitems += `<div class="form-check">
	<input type="checkbox" class="form-check-input" id="" name="checkitem" value="${text}" >
	<label class="form-check-label" for="check1">${text}</label>
	</div>`;

	$("#checklist").append(checkitems);

})