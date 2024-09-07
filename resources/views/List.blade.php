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
			 <li  class="list-group-item active " aria-current="true"><span onclick="OpenModal();" class="tasks">Task</span> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  <span id="ShowListAll" class="tasks" onclick="AllList();">View ALL Task <span></li>
			 @php $i=0; @endphp
			@foreach($data as $key)
			@php $i++ @endphp
			  <li class="list-group-item">{{$i}} &nbsp;  <button type="button"  data-done="{{$key->Status}}"  onclick="CompleteWork('{{$key->id}}');"  id="task{{$key->id}}" class="btn btn-success h3">&check;</button> &nbsp; &nbsp; <span id="taskname{{$key->id}}" >{{$key->Task}}</span></li>  
		  	@endforeach
		</ul>
		
	</div>
</div>
