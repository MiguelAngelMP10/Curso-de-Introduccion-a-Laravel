<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">email</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Desea eliminar...??')"
                                    >
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>