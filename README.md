# Simple MVC (Model-View-Controller)

Este pequeño framework para php utiliza una versión de blade independiente de dependencias de laravel para renderizar y trabajar la vista, Para el sistema de enrutamiento utiliza un mini sistema que soporta variables en ruta para facilitar la creación de APIs, por ejemplo

## Librerias Usadas

- BladeOne (Blade Sin Laravel) [Repositorio](https://github.com/EFTEC/BladeOne/wiki)
- SimplePHPRouter [Repositorio](https://github.com/steampixel/simplePHPRouter)

## Descripción de Carpetas

<img src="https://github.com/SergioRibera/simple-mvc-php/RepoImages(Delete This)/floders.png" />

Todas las configuraciones de la aplicacion php están en el archivo .env, las lineas con un # son ignoradas, para recibir el valor de una configuración se usa Config::get("<config_name>", "<valor_default>");

Toda la carpeta /App contiene los archivos que el usuario maneja

Dentro de /App/View estan todas las vistas las cuales deben tener extensión .blade.php (Extension que es modificable desde el archivo index.php linea 9).

Por último la carpeta /App/Controller contiene todos los controladores que el usuario requiera, estos controladores deben (opcioinalmente y para facilitar) heredar de Controller, más información más abajo.

## Clases y Archivos

#### web.php

Este archivo carga y configura todas las rutas y views de la aplicacion al puro estilo de laravel, ej

```
<?php
   
     Route::get('/home', function(){
         view('home', []);
     });
```

#### Clase Route

La clase Route soporta cualquier metodo de peticion ya sea GET, POST, no confirmados por mi persona PUT.

La clase Route también acepta parametros en url, por ejemplo:

`

```
Route::get('/api/(.*)', function ($var1){
    view('api', ['token' => $var1]);
});
````

Pudiendo recibir muchas variables en una sola url, las expresiones regulares deben ir entre parentesis.

Para más informacion revisar la wiki del repositorio de SimplePHPRouter indicado anteriormente.

#### Función view

La función view es una forma sencilla sin complicaciones de mostrar una vista, esta función recibe dos parámetros el primero `$fileName` este corresponde a la vista que se mostrará en pantalla, el segundo parámetro que recibe no es obligatorio y hace referencia a los parametros que recibirá la vista, por ejemplo si queremos pasarle un nombre, unos productos, o cualquier otro dato que la vista tenga que interpretar y tratar, este dato es de tipo array `$data` por defecto un array vacio.

#### Clase Controller

La clase Controller lo unico de especial que tiene es que esta cuenta con su funcion de procesamiento de vistas sin usar la funcion view, esta clase es para que las demás clases hereden de esta, pero lastimosamente se debe hacer uso de parent:: para poder acceder a sus funciones.

Esta clase cuenta con dos funciones `set` y `render`

La función set recibe un parametro y este corresponde a los datos que recibirá la vista, asi mismo como se mencionaba en la función `view` a su vez estos datos tambien se pueden pasar en el constructor de la clase (aunque no es obligatorio)

La función `render` renderisa la vista indicad aen el parametro `$view` a la cual se le pasaran los datos que se hayan ido agregando, a continuación un ejemplo de todo lo mencionado anteriormente:

```
<?php

    class Home extends Controller{

        public function __construct()
        {
            parent::__construct([]);
        }

        // This is a custom function, called in web on Route::get('/home')
        public function viewHome(){

            /**
             * 
             * Process :3
             * 
             */

            parent::set([ 'newData' => 123 ]);

            parent::render('home');
        }

    }
```

#### Clase DB

La clase DB solo tiene una función `getDB` y esta devuelve una instancia de PDO dependiendo de nuestras configuraciones en el archivo .env (A futuro se agregaran mas funciones a esta clase). Un simple, simplisimo uso para esta clase puede ejecutarse de la siguiente manera:

```
public function insertClient(){
    $db = DB::getDB();
    $stmt = $db->prepare("INSERT INTO Clientes (nombre, ciudad) VALUES (:nombre, :ciudad)");
    $nombre = "Charles";
    $ciudad = "Valladolid";
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':ciudad', $ciudad);  
    $stmt->execute();
}
```

Cualquier bug o problema porfavor reportar a [contact@sergioribera.com](mailto:contact@sergioribera.com)

##### Echo con <3 por [SergioRibera](https://sergioribera.com/)
