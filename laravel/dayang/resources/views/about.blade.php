<x-layouts.app>
    <div class="container-fluid bg-dark text-light">
        <div class="container-fluid ">
            <p>
                Dayang es un videojuego de turnos con la musica como aspecto
            </p>
        </div>
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row">
                    <div class="col-4 align-self-center">
                        <h4 class="text-left">EL VILLANO</h4>
                        <p class="bodytext">
                            El villano de la historia es Daddy Yankee el cual ha robado la música y
                            tendremos que recuperarla derrotando a este
                        </p>
                    </div>
                    <div class="col-6 offset-2">
                        <img src="{{ url('img/daddyyankee.jpeg') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <img src="{{ url('img/tablero.jpg') }}" alt="tablero" class="img-fluid">
                        </div>
                        <div class="col-4 align-self-center">
                            <h4 class="text-right">EL TABLERO</h4>
                            <p class="text-right">
                                Este es el tablero en el cual se desarrolla nuestro juego
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <h5>TOURNAMENTS</h5>
            @forelse($tournaments as $tournament)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $tournament->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $tournament->id }}">
                                {{ $tournament->id }} {{ $tournament->title }} {{ $tournament->location }}
                            </button>
                        </h2>
                        <div id="collapse{{ $tournament->id }}" class="accordion-collapse collapse"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-dark table-responsive-lg text-center table-sm">
                                    <tr>
                                        <th>Username</th>
                                        <th>Tournament</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    @foreach ($registrations as $registration)
                                        @if ($tournament->id == $registration->tournament_id)
                                            <tr>
                                                <td> {{ $users[$registration->user_id - 1]->username }}</td>
                                                <td> {{ $registration->tournament_id }}</td>
                                                <td><button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal{{ $registration->user_id }}">Actualizar</button>
                                                </td>
                                                <td><form action="{{route('delete', $registration)}}" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger" name="delete_registration" value="{{$registration->id}}">Eliminar</button></form></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $tournament->id }}">
                                Registrarse
                            </button>

                            <div class="modal fade text-dark" id="modal{{ $tournament->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Torneo
                                                {{ $tournament->id }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('store') }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                <label>
                                                    Nombre de usuario:
                                                    <input class="form-control" type="text" name="username">
                                                </label>
                                                <label>
                                                    Torneo nº:
                                                    <input class="form-control" type="number" name="tournament_id"
                                                        value="{{ $tournament->id }}" readonly>
                                                </label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade text-dark" id="modal{{ $registration->user_id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar usuario:
                                                {{ $users[$registration->user_id - 1]->username }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" ></button>
                                        </div>
                                        <form action="{{ route('update') }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                <label>
                                                    Nombre de usuario:
                                                    <input class="form-control" type="text" name="username"
                                                        value="{{ $users[$registration->user_id - 1]->username }}">
                                                </label>
                                                <label>
                                                    Usuario nº:
                                                    <input class="form-control" type="number" name="user_id" value="{{$registration->user_id}}" readonly>
                                                </label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row">No hay torneos</div>
            @endforelse
            <div class="align-items-center">
                {{ $tournaments->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
