@extends('layouts.master')
@section('title','Reporte de Accidentes')
@section('content')
<div class="col text-center">
<h3>Reporte de Accidentes</h3>
<br>
<a href="{{route('reg_accident')}}">
<button type='button' class ='btn btn-success' > Registrar Accidente</button>
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
                        <th scope="col">Tipo de Accidente</th>
                        <th scope="col">Gravedad</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Nombres Completos</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($s_accident as $ac)
                                      
                    <tr>
                        <th scope="row">{{$ac->ac_type}}</th>
                        <td>{{$ac->ac_severity}}</td>
                        <td>{{$ac->ac_description}}</td>
                        <td>{{$ac->us_last_name}} {{$ac->us_name}}</td>
                        <td>{{$ac->us_ic}}</td>
                        <td>
                        <a href="{{route('edit_accident',['ac_id'=>$ac->ac_id])}}">
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="{{route('delete_accident',['ac_id'=>$ac->ac_id])}}">
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