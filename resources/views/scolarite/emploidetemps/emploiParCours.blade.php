@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div class="content">
            @foreach ($calendarData as $calendrier)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{asset('images/logo.jpg')}}" alt="Ici le logo de l'ecole" width="300px">
                            <p style="font-family: 'Times New Roman', Times, serif; color:#00BFFF"><i>L'ecole autrement</i></p>
                            <hr color="#00BFFF"/>
                           <h2>Emploi de temps {{$semaine->libelle}}</h2>
                          
                        </div>
        
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <table class="table table-bordered" style="border: 3px solid">
                                <thead>
                                    <th width="125" class="text-center" style="border: 2px solid">Horaires</th>
                                    @foreach($weekDays as $day)
                                        <th class="text-center" style="border: 2px solid">{{ $day }}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @foreach($calendrier as $time => $day)
                                        <tr>
                                            <td style="border: 2px solid">
                                                {{ $time }}
                                            </td>
                                            @foreach($day as $value)
                                                @if (is_array($value))
                                                    <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0; border: 2px solid">
                                                        {{ $value['classe'] }}<br>
                                                        Cours : {{$value['cours']}}<br>
                                                        Volume effectue : {{$value['effectue']}} <br>
                                                        Volume restant : {{$value['restant']}} 
                                                    </td>
                                                @elseif ($value === 1)
                                                    <td style="border: 2px solid"></td>
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
            <br/>
            @endforeach
        </div>

    </div>
    
@endsection