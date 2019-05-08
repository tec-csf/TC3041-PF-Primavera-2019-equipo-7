# Base de datos MySQL en MariaDB
Para la base de datos de vigilantes se empleó MariaDB. A continuación, se presentan los pasos para la creación de nuestra base de datos.

## Instrucciones

### 1. Instalación de MariaDB
Primero se debe descargar el software a emplear. Para verificar si se cuenta con MariaDB, es necesario ejecutar el comando
`mysqladmin --version`

### 2. Acceder a la consola de MariaDB
Una vez que se ha descargado MariaDB se accede a la consola `mysql -u user -p`

### 3. Crear la base de datos
La base de datos se crea con el comando `CREATE DATABASE nombreDB;`

### 4. Crear tabla de vigilantes
Seleccionamos la base de datos donde se creaará la tabla `USE nombreDB;`

Para la tabla de vigilantes se ejecutaron los siguientes comandos

`CREATE TABLE VIGILANTES(vigilante_id int PRIMARY KEY AUTO_INCREMENT, nombre varchar(50) NOT NULL, apellidos varchar(50) NOT NULL, correo varchar(50) NOT NULL, contrasenia varchar(20) NOT NULL, permiso int NOT NULL);`

`ALTER TABLE VIGILANTES ADD CONSTRAINT correo_unique UNIQUE (correo);`
