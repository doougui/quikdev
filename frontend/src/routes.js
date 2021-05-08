import Movies from './pages/Movies.vue';
import DetailedMovie from './pages/DetailedMovie.vue';

export default [
  {
    path: '/movies',
    component: Movies,
  },
  {
    path: '/movies/:id(\\d+)',
    component: DetailedMovie,
  },
  {
    path: '*',
    redirect: '/movies',
  },
];