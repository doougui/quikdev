<template>
  <v-row>
    <v-col
      v-for="movie in sortedMovies"
      :key="movie.id"
    >
      <v-card
        max-width="370"
      >
        <v-img
          :src="`https://image.tmdb.org/t/p/w500/${movie.poster_path}`"
          height="200px"
        ></v-img>

        <v-card-title>
          {{ movie.original_title }}
        </v-card-title>

        <v-card-subtitle></v-card-subtitle>

        <v-card-text>
          {{ movie.overview }}
        </v-card-text>

        <v-card-actions>
          <v-btn
            color="blue accent-4"
            text
          >
            See more
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import axios from 'axios';

export default {
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