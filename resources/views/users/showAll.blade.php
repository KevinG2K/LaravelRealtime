@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <ul id="usersxd">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    //hacemos una petición get para obtener la lista completa de usuarios
    window.axios.get('/api/users')
        //respuesta a la petición
        .then((response) => {
            const usersElement = document.getElementById('usersxd');

            let users = response.data;
            
            users.forEach((user, index) => {
                let element = document.createElement('li');

                element.setAttribute('id', user.id);
                element.innerText = user.name;

                usersElement.appendChild(element);
            });
        });
</script>
@endpush