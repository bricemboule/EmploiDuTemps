<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content-wrapper p-2" style="min-height: 339.816px; font-family: 'Times New Roman', Times, serif;">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                          
                            <p style="font-family: 'Times New Roman', Times, serif; color:#00BFFF"><i>L'ecole autrement</i></p>
                            <hr color="#00BFFF"/>
                           <h2>Emploi de temps {{ $classe->intitule}} : {{$semaine->libelle}}</h2>
                          
                        </div>
        
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <table class="table table-bordered" style="border: 3px solid">
                                <thead>
                                    <th width="100" class="text-center">Horaires</th>
                                    @foreach($weekDays as $day)
                                        <th class="text-center" >{{ $day }}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @foreach($calendarData as $time => $days)
                                        <tr >
                                            <td class="align-middle text-center">
                                                {{ $time }}
                                            </td>
                                            @foreach($days as $value)
                                                @if (is_array($value))
                                                    <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0">
                                    
                                                        {{$value['cours']}}<br>
                                                        
                                                    </td>
                                                @elseif ($value === 1)
                                                    <td ></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <hr color="#00BFFF"/>

                            <div class="text-center">
                                <p>ESSFAR, une école de GEDUQUE SA, autorisation N°17-08298/L/MINESUP/SG/DDES/ESUP/SDA/AEO <br>
                                    Rue 1504, BP 35364, Yaoundé Omnisport Mfandena // Mail : contact@essfar.com <br>
                                    Web: www.essfar.com  // Tel: (+237) 242 00 63 73 / 650 80 62 63 / 650 80 62 54/ 699 83 53 96 / 691 71 73 79
                                </p>
    
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>