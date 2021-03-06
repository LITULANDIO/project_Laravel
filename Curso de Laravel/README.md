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

 Para crear una tabla --> 
 ```
 >php artisan make:migration create_messages_table --create messages
```
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

 Para volver atrás todas las migraciones: 
 ```
 >php artisan migrate:reset
```
 Para volver atrás a una migración anterior: 
 ```
 >php artisan migrate:rollback
```
 Para volver atràs y volver a migrar: 
 ```
 >php artisan migrate:refresh 
```
 Para crear formularios seguros con Laravel, usaremos la función =>  {{csrf_field()}} en cualquier parte dentro de <form>, ésto nos generará un token de autentificación.

 - Validación de formularios:

 $this->validate($request) => si no se escribe nada en el input al enviar el form redirije a la misma página

 @if ($errors->any()) => devolverá algun error si lo hay

 Hay otra manera de validar los forms sin tener la necesidad de usar más lineas de código de lo debido, usando: 
 ```
 >php artisan make:request CreateMessageRequest
```
 Si aparace éste error:  MassAssignmentException hay que usar protected $guarded = [];

 Seeding y Model factories --> para  llenar nuestra base de datos de mensajes para hacerlo de manera práctica, sencilla y rápida a modo de prueba.

 Tinker en la versión 5.4 y/o posteriores es posible que no aparezca comó un paquete interno interna, sino que será externa, revisar en package.json si está isntalado y en >config/app.php y mirar si aparece Tinker en providers.
```
 >php artisan tinker 
```
 Podemos crear e insertar un nuevo objeto en la bd y poder comprovar que se ha insertado.
```
 $message = factory(App\Message::class)->create()
 >php artisan db:seed
```
 Nos creará directamente todos los mensajes, previamente se ha configurado en database/seeds/databaseSeeder.php 
```
   factory(App\Message::class)
            ->times(100)
            ->create();
```
- Cómo volver para atrás y volver a regenerar la bd en sencillos pasos:

Con éste comando vuelve atràs todas las migrations, refresca y vuelve a regenerar las migrations y el seed.
```
>php artisan migrate:refresh --seed
```
- Cómo paginar
En el controller:
```
    Message::paginate(10)
```
- En la vista:
```
    @if(count($messages))
        {{ $messages->links()  }}
    @endif
```
Autentificación con usuarios:

1- Hacer un backup del template
2- >php artisan make:auth

Si queremos editar una tabla para añadir más campos, crearemos una nueva migration ejemplo: vamos a editar la tabla users
```
>php artisan make:migration add_username_and_avatar_to_users_table --table users
```
Una vez generada nos dirijimos a migrations/ y accedemos a ella para insertar los 2 campos / y la eliminación de ellos, guardamos y volvemos a la consola para ejecutar:

```
>php artisan migrate (puede darse el caso de que nos de error)
```
Para ello lo que podemos hacer es borrar la db y vovlerla a crear:
```
>php artisan migrate:reset

>php artisan migrate
```
Para crear una clave foranea relación de una tabla a otra:

$table->integer('user_id')->unsigned();
$table->foreign('user_id')->references('id')->on('users');

y luego los respectivos drops de la clave y tabla


->middleware('auth'); => Espera que esté autenticado el usuario.



