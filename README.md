<h1 align="center">
  QuikDev Test | Movie List Aggregator
</h1>

## :gear: Setup

### Environment

To adjust the correct variables for your local environment, create a copy of the `.env.example` file located in the root folder and paste it as `.env` in the same location as `.env.example`. Fill this file with the corresponding information concerning your local environment. As soon as you open the file, you will see the `TMDB_URL`, `TMDB_API_KEY` and `APP_KEY` variables:

- The `TMDB_URL` should already be filled, but if it isn't, fill with `https://api.themoviedb.org/3`.
- The `TMDB_API_KEY` must be filled with a valid TMDB api_key.
- The `APP_KEY` should already have a default value, but if you'd like to generate a fresh key, you can [use this online key generator](http://www.unit-conversion.info/texttools/random-string-generator/). The `APP_KEY` should be 32 characters long.

### Initializing

:bulb: This project runs with [Docker](https://www.docker.com/).

To install and run both the `backend` and the `frontend` sides of the application, `cd` into the root folder of the project using the Terminal/CMD and type the following command: 
 
```
docker-compose up
``` 

### Local server

After following the above steps, you will be able to access your API at: `http://localhost:8000/`.

Your front-end `Vue` app will be located at: `http://localhost:8080/`.

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

Now you have both the API and the Vue front-end up and running. Thanks for testing.