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

### Environment

To adjust the correct variables for your local environment, create a copy of the file `.env.example` and paste as `.env` inside the project root. 
Fill this file with the corresponding information concerning your local environment. The most import fields are `TMDB_URL`, `TMDB_API_KEY` and `APP_KEY`:

- The `TMDB_URL` should already be filled, but if don't, use `https://api.themoviedb.org/3`.
- The `TMDB_API_KEY` must be filled with a valid TMDB api_key.
- The `APP_KEY` can be generated [using this online key generator](http://www.unit-conversion.info/texttools/random-string-generator/).

### Local server

Inside the `backend/` folder, type the following command:

```
php -S localhost:8000 -t public
```

After that you will be able to access your API in: `http://localhost:8000/`

## :desktop_computer: Front-end

Assuming you have [NPM](https://www.npmjs.com/) installed, enter the `backend/` folder of your project using the Terminal/CMD and type the following command:

### Setup

```
npm install
``` 

### Local server

Inside the `frontend/` folder, type the following command:

```
npm run serve
```

After that you will be able to access your project in: `http://localhost:8080`

## :checkered_flag: Considerations

Now you have both the API and the SPA up and running.