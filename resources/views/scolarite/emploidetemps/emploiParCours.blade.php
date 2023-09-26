@extends('layouts.app')

@section('container')
    <div class="content-wrapper p-2" style="min-height: 339.816px;">
        <div class="content">
            @foreach ($calendarData as $calendrier)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                           <h1>Emploi du temps</h1>
                        </div>
        
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            <table class="table table-bordered">
                                <thead>
                                    <th width="125" class="text-center">Horaires</th>
                                    @foreach($weekDays as $day)
                                        <th class="text-center">{{ $day }}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @foreach($calendrier as $time => $days)
                                        <tr>
                                            <td>
                                                {{ $time }}
                                            </td>
                                            @foreach($days as $value)
                                                @if (is_array($value))
                                                    <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0">
                                                        {{ $value['classe'] }}<br>
                                                        Cours : {{$value['cours']}}<br>
                                                        
                                                    </td>
                                                @elseif ($value === 1)
                                                    <td></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            @endforeach
        </div>

    </div>
    
@endsection