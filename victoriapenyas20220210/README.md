#### 👩‍🏫 Acceso:
* Usuario: mpenas@cifpfbmoll.eu
* Password: Examen2022

## 💾 Base de datos
La base de datos está desplegada en un servidor remoto de IONOS.

URL: [http://victoriapenyasphp.ddns.net/adminer](http://victoriapenyasphp.ddns.net/adminer)

**Importante**: El acceso a http://victoriapenyasphp.ddns.net/ debe ser desde una red ajena al centro, ya que el firewall lo bloquea.

El acceso a la base de datos se puede recuperar desde el .env del proyecto.

## 🚀 Despliegue

El proyecto se ha desplegado en el servidor del centro, dentro de la ruta */var/www/ifc33b/mpenas/examenLaravel20220210/victoriapenyas20220210* [Ver aplicacion](http://mpenas.ifc33b.cifpfbmoll.eu/examenLaravel20220210/victoriapenyas20220210/public/es/posts).

## Aspectos generales

### ⬆️ Seeders y Factorys
Se insertan dos registros mediante factories

### 🔡 Multiidioma
* Se ha configurado el idioma por defecto a español en el *config/app*:

~~~
locale' => 'es'
~~~

* El idioma secundario que se ejecutará en caso de que no se encuentre traducción en el idioma por defecto establecido es:

~~~
'fallback_locale' => 'en'
~~~

* Se ha configurado el *faker* para que en caso de generación de factories se realicen en español:

~~~
‘faker_locale’ => ‘es_ES’
~~~

### 🚪 Gates
El multiidioma de la aplicación se pasa como parámetro en ls URL y se controla mediante el siguiente Gate:

~~~
    Gate::define('check-language', function($user, $locale){

        if (! in_array($locale, ['en', 'es'])) {
            abort(404);
        }

        App::setLocale($locale);

        return true;
    });
~~~

### ❗ Error Pages
Se han generado unas vistas personalizadas para los errores 404 y 403.

#### ERROR 403

* Para la página de error 403, se ha utilizado una plantilla de [Codepen.io](https://codepen.io/Mansoour/pen/LgGGvm).

Esta página se muestra al intentar acceder a un sitio restringido (error 403) y se ha forzado, también en la ruta *fallback*, es decir, cuando se intenta acceder a una ruta que no existe.

~~~
Route::fallback(function(){
  Abort(403);
});
~~~

#### ERROR 404

Se ha programado un *Abort(404)* al intentar acceder a un idioma por URL qué no sean los implementados (ES, EN).