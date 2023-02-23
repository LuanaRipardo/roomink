<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Tinta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/functions.js') }}"></script>


</head>
<body>

    @yield('content')

    <script>

const userButton = document.querySelector('.user-button');

if (userButton) {
  const dropdown = userButton.querySelector('.dropdown');
  userButton.addEventListener('click', function() {
    console.log('Botão de usuário clicado!');

    dropdown.classList.toggle('ativo');
});
}
    </script>


</body>
</html>
