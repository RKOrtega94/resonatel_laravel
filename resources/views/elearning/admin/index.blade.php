@extends('layouts.app', ['activePage' => 'elearning-management', 'titlePage' => __(' - Admin')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <input type="file" name="campoarchivo" id="campoarchivo">
        <div id="mensaje"></div>
        <img src="" alt="">
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyBe7C2-8lUMP1KWPJ_-lkvKzu0ytl5fAME",
        authDomain: "resonatel.firebaseapp.com",
        databaseURL: "https://resonatel.firebaseio.com",
        projectId: "resonatel",
        storageBucket: "resonatel.appspot.com",
        messagingSenderId: "710009860039",
        appId: "1:710009860039:web:54d43ee0d8b8a4733ab3e2"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // Services
    var authService = firebase.auth();
    var storageService = firebase.storage();

    window.onload = function() {
      // realizamos la autenticación anónima (debe estar activada en la consola de Firebase)
      authService.signInAnonymously()
        .catch(function(error) {
          console.error('Detectado error de autenticación', error);
        });

      // asociamos el manejador de eventos sobre el INPUT FILE
      document.getElementById('campoarchivo').addEventListener('change', function(evento){
        evento.preventDefault();
        var archivo  = evento.target.files[0];
        subirArchivo(archivo);
      });
    }

    // función que se encargará de subir el archivo
    function subirArchivo(archivo) {
      // creo una referencia al lugar donde guardaremos el archivo
      var refStorage = storageService.ref('{{ auth()->user()->group }}').child(archivo.name);
      // Comienzo la tarea de upload
      var uploadTask = refStorage.put(archivo);

      // defino un evento para saber qué pasa con ese upload iniciado
      uploadTask.on('state_changed', null,
        function(error){
          console.log('Error al subir el archivo', error);
        },
        function(){
          console.log('Subida completada');
          uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
              console.log('File available at', downloadURL);
              var elMensaje = document.getElementById('mensaje');
              elMensaje.innerHTML = '<img src="' + downloadURL +'" alt="image">';
            });
        }
      );
    }

    // a esta función la invocamos para mostrar el mensaje final después del upload
    function mensajeFinalizado(url, bytes) {
      var elMensaje = document.getElementById('mensaje');
      var textoMensaje = '<p>Subido el archivo!';
      textoMensaje += '<br>Bytes subidos: ' + bytes;
      textoMensaje += '<br>' + url + '</p>';

    }
</script>
@endsection
