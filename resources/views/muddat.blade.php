<!DOCTYPE html>
<html>
<head>
    <title>License Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>To'lovingiz muddati tugagan!<br/>
            Administrator bilan bog'laning yoki litsenziya nomerini kiriting.<br/>
            Telegram: <a href="https://t.me/Urobotuz">@Urobotuz</a><br/>
            Telefon: 99 499 73 64
        </h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" name="kirim" id="kirim" method="post" action="{{ route('license.submit') }}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Litsenziya nomerini kiriting:</label>
                <div class="col-sm-6">
                    <input type="text" name="Litsenziya" class="form-control" />
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Bosing" />
        </form>
    </div>
</body>
</html>
