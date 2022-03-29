<html>
<head>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
</style>
</head>
<body>
    <div class="card">
        <img src="{{ asset('img/logo-RRK-200.png') }}" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><b>{{ $details['title'] }}</b></h4>
            <p>{{ $details['body'] }} by {{ $details['by'] }}.</p>
            <p>Thanks for reading</p>
        </div>
    </div>
</body>
</html>


