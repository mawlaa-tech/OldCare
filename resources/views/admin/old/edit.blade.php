@extends('admin.admin_master')
@section('admin')
@include('admin.sidebar')
<br> 

<div class="container">
    <div class="row p-3">
        <div class="col-6">
            <h2 class="text-primary">
Modifier            </h2>
        </div>
        <br><br>
<form class="row g-3" action="{{url('admin/update/old/'.$olds->id)}}" method="POST" >

 @csrf
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" value="{{$olds->nom}}" name="nom" placeholder="nom">
      @error('nom')

      <span class="text-danger"> {{ $message }} </span>
     
      @enderror
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" value="{{$olds->prenom}}" name="prenom" placeholder="prénom">
   
    </div>
    <div class="col-md-6">
      <label for="inputAddress" class="form-label">Age</label>
      <input type="number" class="form-control"id="age" value="{{$olds->age}}" name="age" placeholder="Age">
    </div>
    <div class="col-md-6">
      <label for="inputAddress2" class="form-label">Adresse</label>
      <input type="text" class="form-control" id="adresse" value="{{$olds->adresse}}" name="adresse" placeholder="Adresse">
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Telephone Proche</label>
      <input type="text" class="form-control" id="proche_number" value="{{$olds->proche_number}}" name="proche_number" placeholder="Telephone">
    </div>
    <div class="col-md-6">
      <label for="inputState" class="form-label">Chambre</label>
      <select id="room_number" class="form-select" name="room_number">
        <option value="chambre 1">{{$olds->room_number}}</option>
        <option value="chambre 2">chambre 3</option>
        <option value="chambre 3">chambre 3</option>

      </select>
    </div>
   <!-- <div class="col-md-6">
      <label for="inputZip" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>-->
    <div class="col-12">
      <div class="form-check">
        
      </div>
    </div>
    <div class="col-12 center ">
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
    <br>
  </form>
</div>
  @endsection