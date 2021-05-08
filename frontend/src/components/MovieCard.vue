<template>
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
</template>

<script>
export default {
  props: ['movie'],
};
</script>