<h3>Food</h3>
<div class="row">
@foreach ($food as $food)
      <div class="col-xs-5 col-sm-2" style="margin:10px" id="accordion">
      	<img src="{{ asset('images/foods/Jellyfish.jpg') }}" width="120" alt="" />
		<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$food->id}}" data-toggle="tooltip" data-placement="top" title="View more"><h4>{{$food->name}}</h4></a>
        <div id="collapse{{$food->id}}" class="panel-collapse collapse out">
	        <span class="text-muted">{{ $food->description }}</span>
        </div>
	    <span class="label label-default">Select here {{ Form::checkbox('foods[]', $food->id, null, array('class' => 'input-xs')) }}</span>
      </div>
@endforeach
</div>
<div class="form-group" style="margin:15px">
		{{ Form::hidden('user', Auth::user()->id, null, array('class'=>'form-control')) }}
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }} 
		{{ link_to('orders','Cancel', array('class'=>'btn btn-danger'))}}
</div>
