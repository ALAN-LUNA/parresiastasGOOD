@extends('layouts.app')

@section('title', 'Empleados')

@section('container')
    <div class="text-center text-white my-1 2">
        <h1>Calificaciones Cursos</h1>
    </div>
    <body style="background: #1a202c">
    <section class="intro mt-2">
        <div class="bg-image h-100" style="background-color: #1a202c;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container" style="background-color: #1a202c;">
                    <div class="row justify-content-center">
                        <div class="col-12" style="background-color: #1a202c;">
                            <div class="card shadow-2-strong">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                                        <table class="table table-dark mb-0">
                                            <thead style="background-color: #1a202c;">
                                            <tr class="text-uppercase text-success">
                                                <th scope="col">Id</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Hora de inicio</th>
                                                <th scope="col">Hora de finalización</th>
                                                <th scope="col">No. Respuestas</th>
                                                <th scope="col">Puntaje</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{$student->user_id}}</td>
                                                    <td>{{$student->display_name}}</td>
                                                    <td>{{$student->attempt_started_at}}</td>
                                                    <td>{{$student->attempt_ended_at}}</td>
                                                    <td>{{$student->total_answered_questions}}</td>
                                                    <td>{{$student->earned_marks}}</td>
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
        </div>
    </section>
    </body>
@endsection
