import Movies from './pages/Movies.vue';

export default [
  {
    path: '/',
    component: Movies,
  },
  {
    path: '*',
    redirect: '/',
  },
];