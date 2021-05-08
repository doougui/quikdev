<template>
  <v-app>
    <header>
      <Header />
    </header>
    <v-main>
      {{ movies }}
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
  }),

  mounted () {
    axios.get('http://localhost:8000/movies')
      .then(response => console.log(response));
  }
};
</script>
