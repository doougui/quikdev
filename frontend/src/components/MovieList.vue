<template>
  <v-row>
    <v-col
      v-for="movie in movies"
      :key="movie.id"
    >
      <MovieCard :movie="movie" />
    </v-col>
  </v-row>
</template>

<script>
import MovieCard from './MovieCard';

export default {
  components: {
    MovieCard,  
  },

  props: ['movies'],
};
</script>