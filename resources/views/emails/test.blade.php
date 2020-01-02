<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>Bienvenido!!</h2>
    <p>{{ $user->firstName." ".$user->lastName }}, se ha creado tu cuenta para el registro de bitácora de Resona, para
        iniciar sesión accede al este
        <a href="http://resonatel.herokuapp.com">link</a>,
        recuerda que tus credenciales de acceso son:</p>
    <p><strong>Usuario: </strong> {{ $user->email }}</p>
    <p><strong>Contraseña: </strong> {{ $user->dni }}</p>

    <p>Una vez haya ingresado puede configurar su perfil y cambiar la contraseña para preveer la integridad de su
        información.</p>

    <img
        src="{{ $message->embed('https://lh3.googleusercontent.com/CEdd3xrhHi2hluCZbvZsBQHWIF-8CBXe0024sjDDmRLGxLz3oYLO_K6VH3lV-IyWINr7r0Khjsdro_BufW2jAz-PXYrdY5HDqESYyMA1EFdeJGrrjpoobNVQNyuZaVyd7W30rPxYyxEZNR_cyNJY12OhN1CUcnV2t_UwKuWyObOhIRhbT5JMbsCB3qM9EfFBtxieujrHTL0gSsvf5t3-WlbzH8W8g1MP9wQnaC0ECY0NVL9t1mxRT6nfmFw-K6SOqKO1wFr8MTa7xh6tfgJKvvesE7_d8LAhA-5cpfBmCdax4HRUG7Wen-WsjifZk9DSkjJ2XEkvhsA49D-MLJwdDUw3x-8P7Nrqgy-4YFGCn3X9CY4XHhkkLNpPUARctcn97JLlDRtCsVausxza-yGeoRLFqv612-1tnxLTlp3Uy1rsffxM8C4z5o8KitxQV7HtGgEasva4EiDScocrboL97RAVpTJqWTa7R_cYFy1tfTsYHVEFq5DJ9LzDPFQdye3e9O2rA9Rv0hMgsksQBmmCF7REpG60eDiyCesJesSXKaZ5uad8f5TKV1Fs7TBhY_cSvWx9dspJwEaxs2zwmD1J41HfDXAQPKMBimT7Ic0TUWJU7RWU8zTvS5cRVha7aJ0fDcPTbwFCHUd4U6InOxkPZzYCKTBd3OGd8SX2R3VngyTZzWsLEd3HwZDzhsd2qYEXxQ0RkPcK-3X9CcAcvubSDGOa7i4f0dWWha2KTwc3UMWP=w495-h250-no') }}">
</body>

</html>
