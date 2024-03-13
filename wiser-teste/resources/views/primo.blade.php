<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verificar Número Primo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Teste Primo</h1>
        <hr>
        <form action="{{ route('primo.check') }}" method="post">
            @csrf
            <label for="number">Número:</label>
            <input type="number" id="number" name="number" required class="form-control mr-2">
            <button type="submit" class="btn btn-primary ml-2">Verificar</button>
        </form>
        @if(isset($number))
            <p>O número {{ $number }} é {{ $isPrime ? 'primo' : 'não primo' }}.</p>
        @endif
</body>
</html>