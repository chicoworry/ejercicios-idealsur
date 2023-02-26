# Ejercicio 3 - CRUD

Teniendo instalado PHP y la extension mysqli iniciar el [built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php) en el directorio `public_html`

```bash
# replace .env.example according to your setup
mv .env.example .env

export $(cat .env | xargs)

cd public_html

php --server localhost:8080
```