# PRUEBA INTELCOST – DESARROLLADOR WEB
## Luis Felipe Siesquen Valdivia

Examen Backend para la empresa Suplos

## Requisitos

- PHP 8.0.12
- MYSQL 5.1.1

## Tags

| Módulo | Funcionalidad |
| ------ | ------ |
| Bienes Dispoibles | Buscar, Agregar, Listar |
| Mis Bienes | Listar, Eliminar |
| Report | Reporte en excel con filtro  |

# Inicio
### Inicio del proyecto
![screenshot](https://i.ibb.co/wYTsJmc/Inicio.png)

### Pregunta 1
LLenado con el JSON que nos proporcionaron al hacer click en el botón 'Mostar Todo' 

![screenshot](https://i.ibb.co/0tVX8tz/Pregunta-1.png)

### Pregunta 2
LLenado en las listas Ciudad y Tipo con el JSON sin que se repita ninguna de ella

![screenshot](https://i.ibb.co/6sXPTkz/Pregunta-2.png)

### Pregunta 3
Filtrado según Ciudad y Tipo, al elegir y presionar el botón 'BUSCAR' se hará una búsqueda y devolverá los bienes con esas características; en caso de querer buscar por una sola Ciudad o Tipo puede dejar el otro vacío y se hará una búsqueda de forma individual

![screenshot](https://i.ibb.co/BrWsb3R/Pregunta-3.png)

### Pregunta 4
El botón Guardar se implementó y se registran los datos del JSON a una base de datos, le genera una copia a la lista mis bienes.

![screenshot](https://i.ibb.co/bPnNSjz/Pregunta-4.png)

### Pregunta 5
Listado de mis bienes, este llenado se debe a la pregunta anterior dónde se realizan las copias o registros.

![screenshot](https://i.ibb.co/2ddbXS0/Pregunta-5.png)

### Pregunta 6
Eliminar un elemento lo hará en la base de datos

![screenshot](https://i.ibb.co/KcgCDhj/Pregunta-6.png)

### NOTA

```sh
Se implementó sweetalert para darle información al usuario respecto a las operaciones que se realiza (Guardar, Eliminar), en el caso de Guardar un bien disponible solo se realizará una sola copia ya que no pueden existir duplicados, el sistema ya te manda una advertencia de ello.
```


### Pregunta 7
Vista del Reporte que se generará en excel, presionando el botón 'EXPORTAR EXCEL'.
NOTA: Aplica la misma lógica del filtro en la pregunta 3.

![screenshot](https://i.ibb.co/R4bmnNw/Pregunta-7-1.png)

Y este es el excel que se genera con el filtro previamente colocado.

![screenshot](https://i.ibb.co/h7SzqPC/Pregunta-7.png)


### Base de datos
En la carpeta "bd"

```sh
intelcost_bienes
```

## Instalación del proyecto

En este caso he usado xammp como gestor de base de datos, pero puede utilizar el que sea de su agrado.

```sh
    Paso 1: Inicializar Servicios
```

Luego procederemos a clonar el proyecto.

```sh
    Paso 2: git clone https://github.com/FSIce1/suplosBackEnd.git
```

Lo copiamos en la carpeta xammp/htdocs/.

```sh
    Paso 3: Creamos la base de datos llamada 'intelcost_bienes' y ejecutamos el script que se encuentra en la carpeta 'bd/intelcost_bienes.sql'
```

Lo copiamos en la carpeta xammp/htdocs/.

```sh
    Paso 4: Con esto podremos ejecutarlo localmente
```


## Más sobre mi

- https://luisfelipe1.herokuapp.com/views/principal/inicio.php