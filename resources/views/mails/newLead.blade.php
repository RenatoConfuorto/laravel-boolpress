<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  <h1>Nuova richiesta di contatto</h1>

  <h2>{{ $lead->name }}</h2>
  <p>
    {{ strlen($lead->message) > 150 
      ? (substr($lead->message, 0, 150) . '...') 
      : $lead->message }}
  </p>
</body>
</html>