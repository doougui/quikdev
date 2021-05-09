<template>
  <v-card
    max-width="370"
  >
    <v-img
      :src="(movie.poster_path) ? `https://image.tmdb.org/t/p/w500/${movie.poster_path}` : `https://via.placeholder.com/500&text=Cover%20not%20found`"
      height="200px"
    ></v-img>

    <v-card-title>
      {{ movie.original_title }}
    </v-card-title>

    <v-card-subtitle>{{ getJoinedData(movie.genre_names) }} &middot; Released at: {{ getFormattedDate(movie.release_date) }}</v-card-subtitle>

    <v-card-text>
      {{ movie.overview }}
    </v-card-text>

    <v-card-actions>
      <v-btn
        :to="`/movies/${movie.id}`"
        color="blue accent-4"
        text
      >
        See more
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
import { getJoinedData, getFormattedDate } from '../utils/helpers';

export default {
  props: ['movie'],

  methods: {
    getJoinedData,
    getFormattedDate,
  }
};
</script>