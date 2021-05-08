import Movies from './pages/Movies.vue';
import DetailedMovie from './pages/DetailedMovie.vue';

export default [
  {
    path: '/',
    component: Movies,
  },
  {
    path: '/:id(\\d+)',
    component: DetailedMovie,
  },
  {
    path: '*',
    redirect: '/',
  },
];