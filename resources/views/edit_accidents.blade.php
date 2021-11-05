@extends('layouts.master')
@section('title','Editar Accidente')
@section('content')
<div class="container">
<p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Editar Accidente</p>
<form action = "{{ url('save_accident_changes')  }}" method = "POST">
    

          <label>Tipo de Accidente: 
              @if($errors->first('ac_type'))
              <p class='text-danger'>{{$errors->first('ac_type')}}</p>
              @endif
          </label>
          <input  name="ac_id" type="hidden" value="{{$all_accidents->ac_id}}">
          <br />
            <select class="form-control"  name="ac_type">
            <option selected = "selected">{{$all_accidents->ac_type}}</option>   
            <option>Raspado</option>
            <option>Choque</option>
            <option>Atropellamiento</option>
            <option>Volcamiento</option>
            <option>Caída de ocupante</option>
            <option>Incendio</option>
            <option>Otro</option>
            </select>
          <br />
          <label>Gravedad del Accidente: 
          @if($errors->first('ac_severity'))
              <p class='text-danger'>{{$errors->first('ac_severity')}}</p>
              @endif
          </label>
          <br />
            <select class="form-control"  name="ac_severity">
            <option selected = "selected">{{$all_accidents->ac_severity}}</option>   
            <option>Solo daños</option>
            <option>Con Heridos</option>
            <option>Con Muertos</option>
            </select>
          <br />
          <label>Descripción:
          @if($errors->first('ac_description'))
              <p class='text-danger'>{{$errors->first('ac_description')}}</p>
              @endif </label>
          <br />
          <textarea  class="form-control" name="ac_description"rows="3">{{$all_accidents->ac_description}}</textarea>
          <br />
          <label>Usuario: 
          @if($errors->first('us_id'))
              <p class='text-danger'>{{$errors->first('us_id')}}</p>
              @endif
          </label>
          <br />
          <select class="form-control"  name="us_id">
          <option selected = "selected" value="{{$all_accidents->us_id}}">{{$all_accidents->us_last_name}} {{$all_accidents->us_name}} - {{$all_accidents->us_ic}}</option>   
            @foreach ($users as $user)
            <option value="{{$user->us_id}}">{{$user->us_last_name}} {{$user->us_name}} - {{$user->us_ic}}</option>
            @endforeach
            </select>
          <br />
          <button class="btn btn-primary">Actualizar</button>
          <br>
          <br>
          </div>

</form>
@endsection