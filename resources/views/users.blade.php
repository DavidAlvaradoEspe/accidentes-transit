@extends('layouts.master')
@section('title','Reporte de Usuarios')
@section('content')
<div class="col text-center">
<h3>Reporte de Usuarios</h3>
<br>
<a href="{{route('reg_user')}}">
<button type='button' class ='btn btn-success' > Registrar usuario</button>
</a>
</div>
@if(Session::has('mensaje'))
<br>
<div class="alert alert-success">{{Session::get('mensaje')}}</div>
@endif
<br>
            <div class="container">
            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_users as $us)
                    <tr>
                       
                        <th scope="row">{{$us->us_ic}}</th>
                        <td>{{$us->us_name}}</td>
                        <td>{{$us->us_last_name}}</td>
                        <td>{{$us->us_phone}}</td>
                        <td>
                        <a href="{{route('edit_user',['us_id'=>$us->us_id])}}">
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{route('delete_user',['us_id'=>$us->us_id])}}">
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </a>
                        </td>
                    </tr>
                    @endforeach 
                    </tbody>
                </table>
                </div>
            </div>
            </div>
@endsection   