<style>
.tasks{
	cursor:pointer;
}
.tasks:hover{
	padding: 10px;
	 background-color: yellow;
	 color: black;
}
</style>
<div class="row mt-4 mb-2" style="overflow-y:auto;max-height: 300px;">
	<div class="col-12">
		<ul class="list-group">
			 <li  class="list-group-item active " aria-current="true"><span onclick="OpenModal();" class="tasks">Task</span> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  <span class="tasks">View ALL Task </span> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <span>Status <span> </li>
			 @php $i=0; @endphp
			@foreach($data as $key)
			@php $i++ @endphp
			  <li class="list-group-item">{{$i}} &nbsp;  &nbsp; &nbsp; <button class="btn btn-light" type="button" onclick="deleteData('{{$key->id}}');"  id="taskDelete{{$key->id}}" style="cursor:pointer;color:white;">&#x274c;</button> <span id="taskname{{$key->id}}" >{{$key->Task}}</span>
			  	&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
			  	@if($key->Status==2)
			  	<span class="text-success" id="taskname{{$key->id}}" >Complete</span>
			  	@else
			  	<span class="text-danger" id="taskname{{$key->id}}" >Incomplete</span>
			  	@endif
			  </li>  
		  	@endforeach
		</ul>
		
	</div>
</div>
