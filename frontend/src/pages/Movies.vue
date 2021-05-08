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
import axios from 'axios';
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
    axios.get('http://localhost:8000/genres')
      .then(response => this.genres = response.data.genres)
    
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
      if (!this.search) {
        axios.get('http://localhost:8000/movies')
          .then(response => this.movies = response.data.results);
      }

      if (this.search) {
        axios.get(`http://localhost:8000/movies?name=${this.search}`)
          .then(response => this.movies = response.data.results);
      }

      if (this.selectedGenres.length) {
        axios.get(`http://localhost:8000/movies?genres=${this.selectedGenres.join(',')}`)
          .then(response => this.movies = response.data.results);
      }
    }
  }
};
</script>
