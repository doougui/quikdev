<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      <v-container>
        <h1>Trending Movies</h1>

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
    page: 1,
  }),

  mounted () {
    axios.get('http://localhost:8000/movies')
      .then(response => this.movies = response.data.results);
  }
};
</script>
