# api-rest (Symfony 4)

## What you need to run the project :

### 1/ Clone project

> git clone *PROJECT_GIT_URL*

### 2/ Installing dependencies

> composer install

### 3/ Packages require

> composer req symfony/apache-pack
>
> composer req annotations
>
> composer require symfony/serializer
>
> composer req symfony/property-access

### 4/ Configure your database in .env

> DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

### 5/ Create your database

> php bin/console doctrine:database:create 
> php bin/console doctrine:schema:update -f

### 6/ Try it

#### Create an article 

Use Postman : [POST] http://your-web-server/articles
Headers : 
    key : Content-Type
    value : application/json
    
Body :
    > {
	  >     "title" : "Titre de mon contenu",
  	>     "content" : "Contenu de mon article"
    > }

#### Show an article 

Use Postman : [GET] http://your-web-server/articles/1 

Get something like :

> {
>    "title": "My first article",
>    "content": "Content of my article",
>    "delivered_at": "Thursday 7th of March 2019 03:05:20 PM"
> }

#### Show all articles

Use Postman : [GET] http://your-web-server/articles

#### Authors URLs

Replace `articles` by `authors`

Post Authors : 

> {
>   	"fullname": "John Doe",
>     "biography": "My super bibliography"
> }


