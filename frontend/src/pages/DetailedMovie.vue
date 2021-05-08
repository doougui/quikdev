<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      <v-container>
        <v-btn
          class="mb-2"
          color="blue accent-4" text
          dark
          @click="$router.go(-1)"
        >
          <v-icon
            dark
            left
          >
            mdi-arrow-left
          </v-icon>Go to previous page
        </v-btn>

        <div class="d-flex">
          <div class="movie-info">
            <h2 class="mt-4 font-weight-light text-uppercase">Movie Information</h2>

            <div class="d-flex">
              <v-img
                :src="(movie.poster_path) ? `https://image.tmdb.org/t/p/w500/${movie.poster_path}` : `https://via.placeholder.com/500&text=Cover%20not%20found`"
                max-width="300"
              ></v-img>

              <div class="mx-4">
                <h1>{{ movie.original_title }}</h1>
                <p class="mb-0"><span class="blue--text accent-4" text>Genres: </span>{{ genres }}</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Production companies: </span>{{ companies }}</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Production countries: </span>{{ countries }}</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Original language: </span>{{ movie.original_language }}</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Release date: </span>{{ movie.release_date }}</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Runtime: </span>{{ movie.runtime }} minutes</p>
                <p class="mb-0"><span class="blue--text accent-4" text>Status: </span>{{ movie.status }}</p>
                <p class="d-block mt-3 font-weight-light" style="max-width: 500px;">{{ movie.overview }}</p>
              </div>
            </div>
          </div>

          <div class="backdrop">
            <h2 class="mt-4 font-weight-light text-uppercase">Backdrop Image</h2>

            <v-img
              :src="(movie.backdrop_path) ? `https://image.tmdb.org/t/p/w500/${movie.backdrop_path}` : `https://via.placeholder.com/500&text=Backdrop%20image%20not%20found`"
              max-width="300"
            ></v-img>
          </div>
        </div>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import api from '../services/api';
import Header from '../components/Header';

export default {
  components: {
    Header,
  },

  data: () => ({
    movie: [],
  }),

  computed: {
    genres: function () {
      return this.movie.genres.map(genre => {
        return genre.name;
      }).join(', ');
    },
    companies: function () {
      return this.movie.production_companies.map(company => {
        return company.name;
      }).join(', ');
    },
    countries: function () {
      return this.movie.production_countries.map(country => {
        return country.name;
      }).join(', ');
    }
  },

  mounted () {
    api.get(`movies/${this.$route.params.id}`)
      .then(response => this.movie = response.data)
      .catch(this.movie = []);
  },
};
</script>
