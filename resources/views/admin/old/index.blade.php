@extends('admin.admin_master')
@section('admin')
@include('admin.sidebar')

<div class="row p-3">
    

    <div class="col-6">
        <h2 class="text-primary">
 Liste des personne agé
        </h2>
    </div>
    <div class="col-6 text-end">
        
<a href="{{route('add.old')}}" class="btn btn-primary">
<i class="bi bi-plus-circle"></i>  Créer personne agé
</a>
    </div>

</div>
        <!--/ counter_area -->
        <!-- table area -->
      <section class="table_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title"><span>List of old men</span></div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Age</th>

                                  <th>Adresse</th>
                                  <th>Number</th>
                                  <th>Room</th>
                                  <th>Date</th>

                                  <td>
                                   Action
                                    </td>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($olds as $old)
                              <tr>
                                <td scope="row">{{$olds->firstItem()+$loop->index}}</td>

                                  <td>{{$old->nom}}</td>
                                  <td>{{$old->prenom}}</td>
                                  <td>{{$old->age}}</td>
                                  <td>{{$old->adresse}}</td>

                                  <td>{{$old->proche_number}}</td>
                                  <td>{{$old->room_number}}</td>
                                  <td>
                                    @if($old->created_at == NULL)
                                    <span class="text-danger">Pas de donnée</span>
                                    @else
                                    {{ Carbon\Carbon::parse($old->created_at)->diffForHumans()}}</td>
                                    @endif

                                  </td>

                                  <td>
                                    <a href="{{URL::to('admin/edit/old/'.$old->id)}}" class="btn btn-info">Modifier</a>
                                    <a href="{{ url('admin/delete/old/'.$old->id)}}" onclick="return confirm('etes vous sure de vouloir siprimmer!!')" class="btn btn-danger">Supprimer</a>

                                </td>
                              </tr>
                             @endforeach
                          </tbody>
                        </table>
                        {{$olds->links()}}
                    </div>
                </div>
            </div><!-- /table -->
            <!-- chart area -->
            

@endsection