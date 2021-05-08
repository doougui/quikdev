<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      <v-container>
        <h1 class="mt-3">Trending Movies</h1>

        <v-select
          :items="genres"
          item-text="name"
          :menu-props="{ maxWidth: '400' }"
          label="Genres"
          multiple
          hint="Pick your desired genres"
          class="my-5"
          persistent-hint
        ></v-select>

        <v-row>
          <v-col
            v-for="movie in movies"
            :key="movie.id"
          >
            <v-card
              max-width="344"
            >
              <v-img
                :src="`https://image.tmdb.org/t/p/w500/${movie.poster_path}`"
                height="200px"
              ></v-img>

              <v-card-title>
                {{ movie.original_title }}
              </v-card-title>

              <v-card-subtitle></v-card-subtitle>

              <v-card-actions>
                <v-btn
                  color="blue accent-4"
                  text
                >
                  See more
                </v-btn>

                <v-spacer></v-spacer>

                <v-btn
                  icon
                  @click="show = !show"
                >
                  <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                </v-btn>
              </v-card-actions>

              <v-expand-transition>
                <div v-show="show">
                  <v-divider></v-divider>

                  <v-card-text>
                    {{ movie.overview }}
                  </v-card-text>
                </div>
              </v-expand-transition>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios';
import Header from './components/Header';

export default {
  name: 'App',

  components: {
    Header,
  },

  data: () => ({
    movies: [],
    genres: [],
    page: 1,
  }),
  computed: {
    genresList() {
      return this.genres.map(genre => {
        return genre.name;
      });
    }
  },
  mounted () {
    axios.get('http://localhost:8000/movies')
      .then(response => this.movies = response.data.results);
    axios.get('http://localhost:8000/genres')
      .then(response => this.genres = response.data.genres)
  }
};
</script>
