<h1 align="center">
  QuikDev Test | Movie List Aggregator
</h1>

## :gear: Back-end

### Setup

:bulb: To install the required dependencies, you'll need to have [NPM](https://www.npmjs.com/) and [Composer](https://getcomposer.org/) installed in your machine.

To install the backend dependencies, enter the `backend/` folder of your project using the Terminal/CMD and type the following command:
 
```
npm install
``` 

and then:
```
composer install
```

#### Environment

To adjust the correct variables for your local environment, create a copy of the file `.env.example` and paste as `.env` inside the project root. 
Fill this file with the corresponding information concerning your local environment. The most import fields are `TMDB_URL`, `TMDB_API_KEY` and `APP_KEY`:

- The `TMDB_URL` should already be filled, but if don't, use `https://api.themoviedb.org/3`.
- The `TMDB_API_KEY` must be filled with a valid TMDB api_key.
- The `APP_KEY` can be generated [using this online key generator](http://www.unit-conversion.info/texttools/random-string-generator/).

#### Local server

Inside the `backend/` folder, type the following command:

```
php -S localhost:8000 -t public
```

After that you will be able to access your API in: `http://localhost:8000/`

## :desktop_computer: Front-end

### Setup

Assuming you have [NPM](https://www.npmjs.com/) installed, enter the `backend/` folder of your project using the Terminal/CMD and type the following command:

```
npm install
``` 

#### Local server

Inside the `frontend/` folder, type the following command:

```
npm run serve
```

After that you will be able to access your project in: `http://localhost:8080`

## :world_map: Routes

### API

```php
Method: GET
Endpoint: `/movies`

Return the list of trending movies.
```

```php
Method: GET
Endpoint: `/movies`
Query Params: `?search={search}`

Return the list of movies that have a name related to the search.
```

```php
Method: GET
Endpoint: `/movies/{movie}`

Return the details of a single movie. The `movie` parameter must be the movie `id`.
```

```php
Method: GET
Endpoint: `/movies/genres/{genres}`

Return the list of movies that have the specified genres. The genres are separated by comma. For example: `http://localhost:8000/movies/genres/28,14`.
```

```php
Method: GET
Endpoint: `/genres`

Return all the available movie genres.
```

### Vue routes

```php
Method: GET
Route: `/movies`

Return a list of trending movies.
```

```php
Method: GET
Route: `/movies/:id`

Return the details of a single movie. The `:id` parameter must be the movie `id`.
```

## :checkered_flag: Conclusion

Now you have both the API and the Vue front-end up and running.