<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name="csrf" content="{{ csrf_token() }}">
	 <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<title>{{$title}}</title>
</head>
<body>

<div style="box-shadow: 5px 5px 6px 6px;border: 2px solid white;border-radius: 25px;min-height: 300px;" class="row ms-5 mt-5">
	<!-- <div class="col-1">
	</div> -->
	<div class="col-10">
		<h2 class="text-center my-4">{{$title}}</h2>
	</div>
	<div class="col-10">
		<div class="d-flex justify-content-center">
			<div class="col-3"><input class="form-control" type="text" name="Task" id="Task"></div>
			<div class="col-2 ms-2"><button class="btn btn-info h4" onclick="AddWork();" type="button" >Enter</button></div>
		</div>

	</div>
	<!-- <div class="col-1">
	</div> -->
	<div  id="result" class="col-10 col-md-10 d-flex justify-content-center">
			<div class="row mt-5" id="Open">
				<div class="col-2 mt-5">
					<!-- <button class="btn btn-info h4 mt-2" onclick="OpenModal();" type="button" >Enter</button> -->
				</div>
			</div>
	</div>
</div>
</body>
</html>
<script src="{{url('assets/App.jquery.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script  type="text/javascript">
let bt = $("#Open").text();
window.onload = OpenModal();
	
function OpenModal(){
	var url = "{{url('')}}";
	$.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: url + '/Show_Task',
            cache: false,
             
            success: function(data) {
           	$("#result").html(data);
   			 }
            });

	// $("#Open").css('display','none');
	// $("#result").html('');
}
	

function CompleteWork(Id){
	var url = "{{url('')}}";
	if($("#task"+Id).data('done')==2){
		alert('Already Added IN TO DO List');
		$("#task"+Id).prop('checked',false);
		return false;
	}
	$.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: url + '/AddTaskComplete',
            cache: false,
             data: {
           'id':Id
           },
            success: function(data) {
           	var obj = JSON.parse(data);
           	alert(obj.msg)
           	OpenModal();
    }
            });
}

function AllList(){
var url = "{{url('')}}";
	$.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: url + '/AllList',
            cache: false,
             
            success: function(data) {
           	$("#result").html(data);
   			 }
            });

	 
}
function deleteData(Id){
if(confirm('Are you sure to Delete this task?')){
	var url = "{{url('')}}";
 $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: url + '/Destroy',
            cache: false,
            data: {
           'id':Id
            },
            success: function(data) {
            var obj = JSON.parse(data);
           	AllList();
   			 }
            });
}
}

function AddWork(){
	var url = "{{url('')}}";
	var Task =  $("#Task").val();
	if($("#Task").val()==""){
		alert('Please Enter Task');
		return false;
	}
	$.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
            },
            url: url + '/CheckList',
            cache: false,
             data: {
           'Task':Task
           },
            success: function(data) {
            	if(data=='true'){
            		alert(' Task Already Added');
            		$("#Task").val('');
            		$("#Task").focus();
					return false;
            	}
				$.ajax({
			            type: 'POST',
			            headers: {
			                'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
			            },
			            url: url + '/store',
			            cache: false,
			             data: {
			           'Task':Task
			           },
			            success: function(data) {
			           	var obj = JSON.parse(data);
			           	alert(obj.msg)
			           	$("#Task").val('');
			           	OpenModal();
			    }
			            });
		}
	});
}

window.onkeyup = function(event){
	 if(event.keyCode==13){
	 	AddWork();
	 }
}
</script>