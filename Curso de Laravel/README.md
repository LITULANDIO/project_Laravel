##APUNTES

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

@extends('layouts.app') --> indica que hereda y extiende otro archivo

'código'