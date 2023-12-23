# FE2ToFrontend

FE2ToFrontend is a PHP script that allows you to publish missions from your FE2 server to your website.
No need for manual reporting to your website anymore!

## Setup:

* Import Pipeline at FE2
* Upload PHP code to your webserver
* Create a mariadb database or use the docker command below
* Change credentials in `db.php` or use constructor parameters
* Define an apikey and set values in FE2 pipeline

## Features:
* Publish missions after 12 hours (can be changed in `db.php`)
* Custom API key to prevent unauthorized access
* Automatic mission deletion after 2 weeks (can be changed in `db.php`)

## Database

Use Docker to start a local database:

```bash
docker run --detach --name some-mariadb --env MARIADB_USER=user --env MARIADB_PASSWORD=secret --env MARIADB_DATABASE=demo --env MARIADB_ROOT_PASSWORD=secret -p 3306:3306 mariadb:latest
```

Feel free to contribute to this project!
This is a private project without any support or warranty.
Use at your own risk. Make sure not to publish confidential data.