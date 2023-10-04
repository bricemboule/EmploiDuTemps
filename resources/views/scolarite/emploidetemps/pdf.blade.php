<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="content-wrapper p-2 text-center" style="min-height: 339.816px; font-family: 'Times New Roman', Times, serif;">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{'data:image/jpg;base64,'.base64_encode(file_get_contents(public_path('/images/logo.jpg')))}}" width="250px">
                            <p style="font-family: 'Times New Roman', Times, serif; color:#00BFFF"><i>L'ecole autrement</i></p>
                            <hr/>
                           <h2>Emploi de temps {{ $classe->intitule}} : {{$semaine->libelle}}</h2>
                          
                        </div>
                        <br/>
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <table class="table table-bordered" style="border: 2px solid">
                                <thead>
                                    <th width="100" class="align-middle text-center" style="border: 1px solid;height:35px">Horaires</th>
                                    @foreach($weekDays as $day)
                                        <th class="align-middle text-center" style="border: 1px solid;height:35px">{{ $day }}</th>
                                    @endforeach
                                </thead>
                                <tbody style="border: 1px solid">
                                    @foreach($calendarData as $time => $days)
                                        <tr style="border: 1px solid">
                                            <td class="align-middle text-center" style="border-right: 1px solid;height:35px">
                                                {{ $time }}
                                            </td>
                                            @foreach($days as $value)
                                                @if (is_array($value))
                                                    <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0;border-right: 1px solid;height:35px">
                                    
                                                        {{$value['cours']}}<br>
                                                        
                                                    </td>
                                                @elseif ($value === 1)
                                                    <td style="border-right: 1px solid;height:35px"></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>