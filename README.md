# TC3041 Proyecto  Final Primavera 2019

# *Solución DeAcero*
---

##### Integrantes:
1. *Samantha Barco Mejia*
2. *Emilio Hernández López*


---
## 1. Aspectos generales

### 1.1 Requerimientos técnicos

A continuación se mencionan los requerimientos técnicos mínimos del proyecto, favor de tenerlos presente para que cumpla con todos.

* El equipo tiene la libertad de elegir las tecnologías de desarrollo a utilizar en el proyecto, sin embargo, debe tener presente que la solución final se deberá ejecutar en una plataforma en la nube. Puede ser  [Google Cloud Platform](https://cloud.google.com/?hl=es), [Azure](https://azure.microsoft.com/en-us/) o AWS [AWS](https://aws.amazon.com/es/free/).
* El proyecto debe utilizar al menos dos modelos de bases de datos diferentes, de los estudiados en el curso.
* La solución debe utilizar una arquitectura de microservicios. Si no tiene conocimiento sobre este tema, le recomiendo la lectura [*Microservices*](https://martinfowler.com/articles/microservices.html) de [Martin Fowler](https://martinfowler.com).
* La arquitectura debe ser modular, escalable, con redundancia y alta disponibilidad.
* La arquitectura deberá estar separada claramente por capas (*frontend*, *backend*, *API RESTful*, datos y almacenamiento).
* Los diferentes componentes del proyecto (*frontend*, *backend*, *API RESTful*, bases de datos, entre otros) deberán ejecutarse sobre contenedores [Docker](https://www.docker.com/) y utilizar [Kubernetes](https://kubernetes.io/) como orquestador.
* Todo el código, *datasets* y la documentación del proyecto debe alojarse en un repositorio de GitHub siguiendo al estructura que aparece a continuación.

### 1.2 Estructura del repositorio
El proyecto sigue la siguiente estructura de carpetas:
```
- / 			        # Raíz de todo el proyecto
    - README.md         # Archivo con los datos del proyecto (este archivo)
    - App           # Carpeta con la aplicación en Android Studio (frontend y backend), apk, liga y manual de usuario.
    - API           # Carpeta con la solución de la API
    - dbs           # Carpeta con instrucciones para generar las bases de datos
```

### 1.3 Documentación  del proyecto

Como parte de la entrega final del proyecto, se debe incluir la siguiente información:

* Justificación de los modelo de *bases de datos* que seleccionaron.
* Descripción del o los *datasets* y las fuentes de información utilizadas.
* Guía de configuración, instalación y despliegue de la solución en la plataforma en la nube  seleccionada.
* Documentación de la API. Puede ver un ejemplo en [Swagger](https://swagger.io/). 
* El código debe estar documentado siguiendo los estándares definidos para el lenguaje de programación seleccionado.

## 2. Descripción del proyecto

Este proyecto busca solucionar una problemática real dentro de la industria de reciclaje. Trabajando de la mano con la recicladora de acero DeAcero, se encontró una problemática fundamental dentro de su operación. Tal problemática consiste en que los camiones proveedores de material tardaban demasiado en acceder a los patios de reciclaje para vender el material, por lo que se iban a otros patios competidores. Se encontró que este problema era en gran medida causado por el registro manual de los camiones y por la lenta organización de los vigilantes. Como solución a esta problemática, este proyecto propone el uso de aplicaciones móviles para los vigilantes complementado de un sistema de preregistro para los proveedores. De esta forma los vigilantes solamente tienen que corroborar la información dada por el proveedor y aceptar o denegar salida. Además de que se implementa un módulo de registro digital para proveedores sin preregistro, haciendo sus futuras visitas más eficientes.

## 3. Solución

A continuación aparecen descritos los diferentes elementos que forman parte de la solución del proyecto.



### 3.1 Modelos de *bases de datos* utilizados

Se realizó un análisis de la operativa de DeAcero, de sus requerimientos funcionales y no funcionales. Teniendo en cuenta esta información, se plantearon los modelos de bases de datos utilizados en esta propuesta. Este proyecto utiliza dos modelos de Bases de Datos, existe un modelo SQL administrado por MariaDB donde se almacena la información de los vigilantes. Por otro lado, se utiliza un modelo basado en documentos administrado por FireBase donde se almacena la infromación de camiones, proveedores, contenedores, conductores y envíos. El modelo SQL se utiliza para aprovechar el desarrollo previo que ya tiene la empresa, mientras que el modelo basado en documentos se utiliza para aprovechar las capacidades de sincronización de FireBase. De esta forma, se aprovechan estas capacidades como un backend administrado por el mismo manejador FireBase. 


### 3.2 Arquitectura de la solución

La arquitectura de nuestra propuesta se basa en la capacidad de escalabilidad por un futuro crecimiento de DeAcero en la industria.  A la vez, busca cumplir requerimientos no funcionales por políticas internas. Con estas políticas y objetivos en mente se decidió almacenar la base de datos SQL de vigilantes en servidores propios de DeAcero, mientras que por escalabilidad se almacenará la base de datos de documentos en servidores de FireBase. La base de datos de. La aplicación se comunicará con los servidores de DeAcero a través de servicios REST desplegados en sus servidores, al mismo tiempo tendrá conexión con las bases de datos de FireBase a través de los servicios de conectividad móvil que ofrece el manejador. Así, nuestra propuesta basa la aplicación móvil como centro de la solución para brindar una propuesta integral y completa ante la necesidad del cliente.

**

### 3.3 Frontend

El frontend de nuestra aplicación corre sobre dispositivos móviles con sistema operativo Android. La aplicación fue escrita en Java a través de Android Studio. Para el diseño de la misma se utilizó una librería de Material Design que brinda aspectos visuales. Además, se utilizó Volley como dependencia para conectarse con los servicios REST. Desde el punto de vista de desarrollo no se utilizó ningún framework más que el propio de Android. 

#### 3.3.1 Lenguaje de programación
* Java
* https://docs.oracle.com/javase/8/docs/

#### 3.3.2 Framework
* Android Studio
* https://developer.android.com/docs 

#### 3.3.3 Librerías de funciones o dependencias
* Material Design
* https://github.com/navasmdc/MaterialDesignLibrary 

* Volley
* https://developer.android.com/training/volley/index.html

### 3.4 Backend

El backend de nuestra solución está basado en PHP desplegado en el servidor del cliente, combinado con el servicio de sincronización de FireBase.

#### 3.4.1 Lenguaje de programación
* PHP 
* https://www.php.net/manual/en/tutorial.php 

#### 3.4.2 Framework
* FireBase 
* https://firebase.google.com/docs/firestore/quickstart?authuser=0

### 3.5 API

La implementación de la API del proyecto se basa en llamadas a los servicios REST del servidor a través de la herramienta Volley. Además, se utilizan las conexiones predeterminadas que brinda el servicio FireBase con sus bases de datos. 

#### 3.5.1 Lenguaje de programación
* Java
* https://docs.oracle.com/javase/8/docs/

#### 3.5.2 Framework
* FireBase
* https://firebase.google.com/docs/firestore/quickstart?authuser=0

#### 3.5.3 Librerías de funciones o dependencias
* Volley
* https://developer.android.com/training/volley/index.html





* **Descripción**:
* **URL**:
* **Verbos HTTP**:
* **Headers**:
* **Formato JSON del cuerpo de la solicitud**: 
* **Formato JSON de la respuesta**:

Endpoints para MySQL: Los siguientes endpoints se conectan a la base de datos de vigilantes en MySQL. De los verbos HTTP, emplean GET para recuperar los datos enviados con el URL. La siguiente lista muestra URL ejemplo, los valores cambian de acuerdo a la petición.

* recuperarVigilante.php

* Descripción: PHP que se conecta a la base de datos MySQL y recupera al vigilante cuyo correo electrónico sea igual al que se recibe con el método GET.
*   URL: http://ubiquitous.csf.itesm.mx/~pddm-1196844/Parcial3/ProyectoFinal/test/recuperarVigilante.php/?correo=123@123.com.
*   Formato de la solicitud: La solicitud incluye el correo electrónico del vigilante a recuperar.
*  Formato JSON de la respuesta: Como respuesta se reciben 2 JSON. El primero indica el resultado de la operación, 0 si no se encontró el usuario y 1 si se encontró.

* Si se encuentra el usuario, entonces devuelve un segundo JSON con los siguientes elementos: id, nombre, apellidos, correo, contraseña y permisos. 
Ejemplo: [{"Codigo":"1","Mensaje":"Bienvenido"},{"id":"35","nombre":"Sam","apellidos":"Barco Mejia","correo":"123@123.com","contrasenia":"123","permiso":"0"}]
[{"Codigo":"0","Mensaje":"Usuario no encontrado"}]


* eliminarVigilante.php

* Descripción: PHP que se conecta a la base de datos MySQL, determina si el vigilante a eliminar existe y, de ser así, lo elimina.
*   URL: http://ubiquitous.csf.itesm.mx/~pddm-1196844/Parcial3/ProyectoFinal/test/eliminarVigilante.php/?correo=samantha@deacero.mx
*   Formato de la solicitud: La solicitud incluye el correo electrónico del vigilante a eliminar
*   Formato JSON de la respuesta: Como respuesta se recibe un JSON con un código y un mensaje, dependiendo del resultado de la operación. 
Ejemplo:
[{"Codigo":"0","Mensaje":"Usuario no encontrado"}]
[{"Codigo":"1","Mensaje":"Usuario eliminado correctamente"}]

*   aniadirVigilante.php:

*   Descripción: PHP que se conecta a la base de datos MySQL, añade un vigilante a la base de datos.
*   URL: http://ubiquitous.csf.itesm.mx/~pddm-1196844/Parcial3/ProyectoFinal/test/aniadirVigilante.php/?nombre=Nico&apellidos=Barco%20Mejia&correo=nicolas@deacero.mx2&contrasenia=123&permiso=0
*   Formato de la solicitud: Para añadir a un vigilante se debe incluir nombre, apellidos, correo electrónico, contraseña para la aplicación y permisos (0 para vigilantes y 1 para administradores).
*   Formato JSON de la respuesta: Como respuesta se recibe un JSON con un código y un mensaje, dependiendo del resultado de la operación.
* Ejemplo:
[{"Codigo":"1","Mensaje":"Usuario añadido correctamente"}]
[{"Codigo":"0","Mensaje":"El correo ya está en uso"}]

*   actualizarVigilante2.php

*  Descripción: PHP que actualiza nombre, apellidos, correo y permisos de un vigilante. Antes de realizar dicha actualización, corrobora que los datos a emplear sean válidos.
*   URL: http://ubiquitous.csf.itesm.mx/~pddm-1196844/Parcial3/ProyectoFinal/test/actualizarVigilante2.php/?nombre=Nicolas&correoOrig=nicolas@deacero.mx&correoNuevo=nicolas@deacero.mx&apellidos=Barco%20Mejia&permiso=1
*   Formato de la solicitud: Para añadir a un vigilante, primero se recupera su información de la base de datos (empleando recuperarVigilante.php) de manera que el administrador vea la información que está guardada. Posteriormente, junto con el correo anterior se envía el nuevo correo a emplear (o el mismo, si no hay cambios), nombre, apellidos, correo electrónico y permisos (0 para vigilantes y 1 para administradores).
*   Formato JSON de la respuesta: Como respuesta se recibe un JSON con un código y un mensaje, dependiendo del resultado de la operación.
* Ejemplo:
Si los datos a actualizar son válidos: [{"Codigo":"1","Mensaje":"El usuario se actualizó correctamente"}]
Si se no existe el correo electrónico del usuario a actualizar: [{"Codigo":"01","Mensaje":"El usuario a actualizar no existe"}]
Si el nuevo correo electrónico ya está en uso: [{"Codigo":"02","Mensaje":"El nuevo correo ya está en uso"}]

* Endpoints para FireBase:

*   Descripción: Firebase cuenta con su propio API REST, que puede ser empleado con los siguientes datos:
*   ID de la base de datos (deacero-f29ad)
*   Nombre de la colección
*   ID del documento
*   URL: https://firestore.googleapis.com/v1beta1/projects/deacero-f29ad/databases/(default)/documents/envios/2ADMdDeScT2fmo2JxZde 

En el URL anterior se accede a la colección “envios” documento “2ADMdDeScT2fmo2JxZde”

*   Formato JSON de la respuesta: La respuesta es un JSON que muestra el nombre del documento, campos, fecha de creación y de última actualización. Los campos varían dependiendo la colección y documento al que se acceda.
*   Ejemplo:
{
  "name": "projects/deacero-f29ad/databases/(default)/documents/envios/2ADMdDeScT2fmo2JxZde",
  "fields": {
    "aceptado": {
      "integerValue": "1"
    },
    "placasContenedor": {
      "stringValue": "abc"
    },
    "material": {
      "stringValue": "x"
    },
    "idProveedor": {
      "stringValue": "1"
    },
    "idDireccion": {
      "stringValue": "1"
    },
    "placasCamion": {
      "stringValue": "abc"
    },
    "peso": {
      "stringValue": "x"
    },
    "idConductor": {
      "stringValue": "1"
    }
  },
  "createTime": "2019-05-03T06:32:58.790883Z",
  "updateTime": "2019-05-03T06:32:58.790883Z"
}




## 3.6 Pasos a seguir para utilizar el proyecto


Para comenzar a utilizar el proyecto es necesario contar con un dispositivo Android donde se vaya a correr la aplicación.

    1- Se descarga la aplicación al dispositivo desde github.

    2- Se abre la aplicación y se accede al servicio con las credenciales brindadas.


## 4. Referencias


* Android Studio
* https://developer.android.com/docs 

* Java
* https://docs.oracle.com/javase/8/docs/

* FireBase
* https://firebase.google.com/docs/firestore/quickstart?authuser=0

* Volley
* https://developer.android.com/training/volley/index.html

* PHP
* https://www.php.net/manual/en/tutorial.php 


