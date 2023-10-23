@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">

        <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Création d'une classe</h1>
                            </div>

                        </div>
                    </div>
        </div>
        <div class="card card-success">

            <form action="{{url('scolarite/classe/creer')}}" method="post" id="formClass">
                  {{@csrf_field()}}
                <div class="card-body">
                   <div class="row">
                        <div class="form-group col-sm-6">
                            <label >Code : </label>
                            <select class="form-control" name="code" onchange="choix(this.value)" id="code">
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

                <div class="card-footer mx-5 mb-2">
                    <button type="submit" class="btn btn-primary col-11" id="addClass">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script>

    function choix(){
        if (document.getElementById('code').value == 'L1'){
            
        }

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
    
@endsection