<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      <v-container>
        <h1 class="mt-3">{{ search ? `Results for "${search}"` : 'Trending Movies' }}</h1>

        <v-text-field
          label="Search by movie name"
          hide-details="auto"
          v-model.lazy="search"
          @input="fetchMovies"
        ></v-text-field>

        <v-select
          :items="genres"
          item-value="id"
          item-text="name"
          :menu-props="{ maxHeight: '400' }"
          label="Genres"
          multiple
          hint="Pick your desired genres"
          class="my-5"
          persistent-hint
          v-model="selectedGenres"
          @change="fetchMovies"
        ></v-select>

        <MovieList :movies="sortedMovies" />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import api from '../services/api';
import Header from '../components/Header';
import MovieList from '../components/MovieList';

export default {
  name: 'App',

  components: {
    Header,
    MovieList,
  },

  data: () => ({
    search: '',
    movies: [],
    selectedGenres: [],
    genres: [],
  }),

  mounted () {
    api.get('genres')
      .then(response => this.genres = response.data.genres)
      .catch(this.genres = []);
    
    this.fetchMovies();
  },

  computed: {
    sortedMovies: function () {
      return [...this.movies].sort((a, b) => {
        return (a.original_title > b.original_title) ? 1 : -1;
      });
    },
  },

  methods: {
    fetchMovies () {
      let endpoint = 'movies';
      
      if (this.search) {
        endpoint = `movies?search=${this.search}`;
      }

      if (this.selectedGenres.length) {
        endpoint = `movies/genres/${this.selectedGenres.join(',')}`;
      }

      api.get(endpoint)
        .then(response => this.movies = response.data.results)
        .catch(this.movies = []);
    }
  }
};
</script>
