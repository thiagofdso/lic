<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Confirme seu Email</h2>

<div>
    Obrigado por criar uma conta.
    Porfavor clique no link para verificar seu email.
    <a href="{{route('auth.confirm',['confirmationCode'=>$confirmation_code])}}">Confirme seu email</a><br/>

</div>

</body>
</html>