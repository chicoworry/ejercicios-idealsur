# Ejercicio 2 - SQL

Despues de instalar y configurar el servidor MySQL

```bash
# replace .env.example according to your setup
mv .env.example .env

export $(cat .env | xargs)

mysql --user=$MYSQL_USER --password=$MYSQL_PASSWORD
```

Una vez validado el acceso creamos la DB y cargamos los datos

```sql
CREATE DATABASE idealsur;

USE idealsur;

source tablas.sql

exit
```

Para hacer las queries en 'batch mode'

```bash
mysql --user=$MYSQL_USER --password=$MYSQL_PASSWORD --table < query1.sql 2> /dev/null
```