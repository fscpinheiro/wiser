<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teste Eloquent</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Teste Eloquent / Scope</h1>
        <hr>
        <div class="row mb-3">
            <div class="col-md-4">
                <a href="/" class="btn btn-primary">Voltar à página inicial</a>
                <button onclick="location.href='/eloquent';" class="btn btn-secondary ml-2">Recarregar página</button>
            </div>
            <div class="col-md-8">
                <form action="{{ route('products.filterByPrice') }}" method="get" class="form-inline justify-content-end">
                    <label for="price" class="mr-2">Preço mínimo:</label>
                    <input type="number" name="price" value="{{ request()->get('price', 0) }}" class="form-control mr-2">
                    <button class="btn btn-warning" type="submit">Filtrar</button>
                    <a href="{{ route('products.clearFilter') }}" class="btn btn-danger ml-2">Limpar filtro</a>
                </form>
            </div>
            <div class="col-md-12 text-right">
                @if(request()->has('price'))
                    <p class="mt-2">Filtrando produtos com preço maior que: {{ request()->get('price') }}</p>
                @endif
            </div>
        </div>
        <br>
        @if ($products->count())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @else
        <p>No products found.</p>
    @endif


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>
</html>