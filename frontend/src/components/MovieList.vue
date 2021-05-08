<template>
  <v-row>
    <v-col
      v-for="movie in sortedMovies"
      :key="movie.id"
    >
      <MovieCard :movie="movie" />
    </v-col>
  </v-row>
</template>

<script>
import axios from 'axios';
import MovieCard from './MovieCard';

export default {
  components: {
    MovieCard,  
  },

  data: () => ({
    movies: [],
    page: 1,
  }),

  computed: {
    sortedMovies: function () {
      return [...this.movies].sort((a, b) => {
        return (a.original_title > b.original_title) ? 1 : -1;
      });
    }
  },
  
  mounted () {
    axios.get('http://localhost:8000/movies')
      .then(response => this.movies = response.data.results);
  }
};
</script>