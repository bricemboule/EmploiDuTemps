@extends('layouts.app')

@section('container')
     <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div className="content">
            <div className="container-fluid"> 
                <br/>   
                <br/>  

                <!-- Modal -->
                <div class="modal fade" id="addClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une classe</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" id="formClass" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label >Code : </label>
                                            <select class="form-select" aria-label="Default select example" name="code" onchange="choix(this.value)" id="code">
                                                    <option value=""></option>
                                                    <option value="L1">L1</option>
                                                    <option value="L2">L2</option> 
                                                    <option value="L3">L3</option>
                                                    <option value="M1 ACT">M1 ACT</option> 
                                                    <option value="M1 INF">M1 INF</option>
                                                    <option value="M1 SBD">M1 SBD</option>
                                                    <option value="M2 ACT">M2 ACT</option> 
                                                    <option value="M2 INF">M2 INF</option>
                                                    <option value="M2 SBD">M2 SBD</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label >Intitule : </label>
                                            <input type="text" id="intitule" class="form-control" name="intitule" placeholder="intitule" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                
                                            <div class="form-group">
                                                <label>Cycle : </label>
                                                <input type="text" id="cycle" class="form-control" name="cycle" placeholder="cycle" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label >Specialité : </label>
                                            <input type="text" id="specialite" class="form-control" name="specialite" placeholder="specialite" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary" id="addClasse">Valider</button>
                                </div>
                            </form>
                        </div>
                        
                      </div>
                    </div>
                </div>

                <div style="margin-bottom: 10px;" class="d-flex flex-row justify-content">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClass">
                        <i class="fa-solid fa-plus"></i> Ajouter une classe
                    </button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">Liste des classes</h1>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" id="listClasse">
                                <table class="table table-striped align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">CODE</th>
                                            <th class="text-center">INTITULE</th>
                                            <th class="text-center">CYCLE</th>
                                            <th class="text-center">SPECIALITE</th>
                                             <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($classes as $key=>$classe)
                                            <tr >
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{$classe->code}}</td>
                                            <td class="text-center">{{$classe->intitule}}</td>
                                            <td class="text-center">{{$classe->cycle}}</td>
                                            <td class="text-center">{{$classe->specialite->intitule}}</td>
                                            
                                            <td class="text-center">
                                                <a href="{{url('scolarite/classe/modifier/'.$classe->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{url('scolarite/classe/supprimer/'.$classe->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            </td>
                                        </tr>
                                      @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                                
            </div>
        </div>
    </div> 
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"></script>
   <script>
         function choix(){
            switch (document.getElementById('code').value) {
                case 'L1':
                    document.getElementById('intitule').value = 'Licence 1';
                    document.getElementById('cycle').value = 'Licence';
                    document.getElementById('specialite').value = 'Mathematiques'
                    break;
                case 'L2' :
                    document.getElementById('intitule').value = 'Licence 2';
                    document.getElementById('cycle').value = 'Licence';
                    document.getElementById('specialite').value = 'Mathematiques'
                    break;
                
                case 'L3' :
                    document.getElementById('intitule').value = 'Licence 3';
                    document.getElementById('cycle').value = 'Licence';
                    document.getElementById('specialite').value = 'Mathematiques'
                    break;

                case 'M1 ACT' :
                    document.getElementById('intitule').value = 'Master 1 actuariat';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = 'Actuariat'
                    break;
                case 'M1 INF' :
                    document.getElementById('intitule').value = 'Master 1 Ingenierie Financiere';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = 'Ingenierie Financiere'
                    break; 
                case 'M1 SBD' :
                    document.getElementById('intitule').value = 'Master 1 Statistique et Big Data';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = ' Statistique et Big Data'
                    break; 
                case 'M2 ACT' :
                    document.getElementById('intitule').value = 'Master 2 actuariat';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = 'Actuariat'
                    break;
                case 'M2 INF' :
                    document.getElementById('intitule').value = 'Master 2 Ingenierie Financiere';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = 'Ingenierie Financiere'
                    break; 
                case 'M2 SBD' :
                    document.getElementById('intitule').value = 'Master 2 Statistique et Big Data';
                    document.getElementById('cycle').value = 'Master';
                    document.getElementById('specialite').value = ' Statistique et Big Data'
                    break;      
                default:
                    break;
                }
        }
   </script>
   <script>
          //add class
       $(function(){
          $('#formClass').submit(function (e) { 
            e.preventDefault();
            
          }); 
       });
   </script>
@endsection
