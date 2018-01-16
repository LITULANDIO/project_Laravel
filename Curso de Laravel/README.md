## APUNTES

Laravel está orientado para realizar aplicaciones rápidas.

- Tener instalado xampp(servidor web apache)
- Instalar composer: https://getcomposer.org/download/
- Instalar laravel: 
```
C:\xampp\htdocs>composer create-project laravel/laravel project_laravel--prefer-dist
```

Application key [base64:/yRh8yXuf21maZPuKc7RCOgLntOrNC/688o62L91SPU=] set successfully.

Para encender el servidor: >php artisan serve 

En la carpeta Resources/VIEWS --> vistas
En la carpeta ROUTES --> rutas 

Blade --> renderizador de código php, @ es su forma de sustituir el <?php {código}

iterator for en laravel: 
```
@foreach ($links as $link => $text)
<a href="{{$link}}"> {{$text}}</a>
@endforeach
```
la forma de mostrar un echo en php con Blade es usadndo {{ $variable }}

Las variables en en blade se inicializan en las rutas. Aunque toda la lógica para realizar buenas prácticas hay que inckuirlo en un controlador

Ejemplo: 

```Route::get('/', function () {
    $links =[
    'https://platzi.com/laravel' => 'Curso de laravel',
    'https://laravel.com => 'Página de Laravel']
    return view('welcome', [
        'links' => $links,
    ]);
});
```

- Aunque toda la lógica para realizar buenas prácticas hay que inckuirlo en un controlador

Para ello crearemos un controlador de ejemplo:

La ruta dond se encuentran los contorladores es: app/https/Controllers/ aquí
```
>php artisan make:controller PagesController
```
@yield('content') --> Sirve para etiquetar/pegamento del contenido que existe en otra template

Entonces en otra template para relacionar el yeald --> @section('content')
                                                        aquí el contenido
                                                        @endsection

@extends('layouts.app') --> indica que hereda y extiende otro archivo

'código'

 @forelse --> igual que foreach pero con la posibilidad de indicar si no existe información indicarlo.

 ## Base de datos

 Para crear una tabla --> >php artisan make:migration create_messages_table --create messages

 Para actualizar: composer update

 Para actualizar la db con las migraciones tenemos que tener en cuenta de: 

 en nuestro proyecto config/database.php, posterior a esto cambie las siguientes lineas

'charset' => 'utf8mb4',
 'collation' => 'utf8mb4_unicode_ci',

A

'charset' => 'utf8',
 'collation' => 'utf8_unicode_ci',

 Posteriormente ejecutamos >php artisan migrate

 Para crear un índice: make:migration add_created_at_index_to_messsages_table --table messsages

 nombre_columna + index + nombre_tabla 

 Para volver atrás todas las migraciones: >php artisan migrate:reset

 Para volver atrás a una migración anterior: >php artisan migrate:rollback

 Para volver atràs y volver a migrar: >php artisan migrate:refresh 

 Para crear formularios seguros con Laravel, usaremos la función =>  {{csrf_field()}} en cualquier parte dentro de <form>, ésto nos generará un token de autentificación.

 - Validación de formularios:

 $this->validate($request) => si no se escribe nada en el input al enviar el form redirije a la misma página

 @if ($errors->any()) => devolverá algun error si lo hay

 Hay otra manera de validar los forms sin tener la necesidad de usar más lineas de código de lo debido, usando: 
 >php artisan make:request CreateMessageRequest

 Si aparace éste error:  MassAssignmentException hay que usar protected $guarded = [];

