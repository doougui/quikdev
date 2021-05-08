<template>
  <v-app-bar
    app
    color="blue accent-4"
    dark
  >
    <router-link to="/" class="white--text text-decoration-none">
      <v-toolbar-title>Movie List Aggregator</v-toolbar-title>
    </router-link>

    <v-spacer></v-spacer>

    <v-btn
      href="https://github.com/doougui/quikdev"
      target="_blank"
      text
    >
      <span class="mr-2">See on GitHub</span>
      <v-icon>mdi-open-in-new</v-icon>
    </v-btn>
  </v-app-bar>
</template>