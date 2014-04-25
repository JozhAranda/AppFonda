<!--div class="form-group">
	{{ Form::hidden('user', Auth::user()->id, null, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('foods', 'Foods') }}
	{{ Form::select('foods', $food, null, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }} 
		{{ link_to('orders','Cancel', array('class'=>'btn btn-danger'))}}
</div-->
<h3>Food</h3>
<?php $i = 0 ?>
<div class="row">
@foreach ($food as $food)
      <?php $i = $i + 1 ?>
      <div class="col-xs-5 col-sm-2" style="margin:10px">
      	<img src="{{ asset('images/foods/Jellyfish.jpg') }}" width="120" alt="" />
		<h4>{{$food}}</h4>
        <span class="text-muted">{{ $food }}
        	{{ Form::checkbox('foods[]', $i, null, array('class' => 'input-xs')) }}
        </span>
        
      </div>
@endforeach
</div>
<div class="form-group" style="margin:15px">
		{{ Form::hidden('user', Auth::user()->id, null, array('class'=>'form-control')) }}
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }} 
		{{ link_to('orders','Cancel', array('class'=>'btn btn-danger'))}}
</div>
