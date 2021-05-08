<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      <v-container>
        <h1 class="mt-3">Trending Movies</h1>

        <v-text-field
          label="Search by movie name"
          hide-details="auto"
        ></v-text-field>

        <v-select
          :items="genres"
          item-text="name"
          :value="genres.id"
          :menu-props="{ maxHeight: '400' }"
          label="Genres"
          multiple
          hint="Pick your desired genres"
          class="my-5"
          persistent-hint
        ></v-select>

        <MovieList />
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
    genres: [],
  }),

  mounted () {
    axios.get('http://localhost:8000/genres')
      .then(response => this.genres = response.data.genres)
  },
};
</script>
