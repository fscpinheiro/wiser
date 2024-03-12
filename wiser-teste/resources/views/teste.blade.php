<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teste UserObserver</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Teste Observer</h1>
        <a href="/" class="btn btn-primary mt-3">Voltar à página inicial</a>
        <button id="create" class="btn btn-success mt-3">Criar</button>
        <button id="update" class="btn btn-primary mt-3">Atualizar</button>
        <button id="delete" class="btn btn-danger mt-3">Excluir</button>
        <hr>
        <h4> Logs </h4>
        <textarea id="log" class="form-control mt-5" rows="10"></textarea>
        <button id="refresh" class="btn btn-secondary mt-3">Atualizar Log</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>

        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Criar um usuário
        document.getElementById('create').addEventListener('click', function() {
            axios.post('/user/create')
                .then(function (response) {
                    alert(response.data.message);
                    refreshLogs();
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    
        // Atualizar um usuário
        document.getElementById('update').addEventListener('click', function() {
            axios.put('/user/update')
                .then(function (response) {
                    alert(response.data.message);
                    refreshLogs();
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    
        // Excluir um usuário
        document.getElementById('delete').addEventListener('click', function() {
            axios.delete('/user/delete')
                .then(function (response) {
                    alert(response.data.message);
                    refreshLogs();
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    
        document.getElementById('refresh').addEventListener('click', refreshLogs);

        function refreshLogs() {
            axios.get('/logs')
            .then(function (response) {
                document.getElementById('log').value = response.data;
            })
            .catch(function (error) {
                console.error(error);
            });
        }
    </script>
</body>
</html>