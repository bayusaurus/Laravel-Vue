import Login from '../views/auth/Login.vue';

import Home from '../views/Home.vue';
import Contact from '../views/Contact.vue';
import About from '../views/About.vue';

// NOTE
import NewNote from '../views/note/Create.vue';
import TableOfNotes from '../views/note/Table.vue'
import ShowTheNote from '../views/note/Show.vue'
import EditNote from '../views/note/Edit.vue'
import NotFound from '../components/NotFound.vue'


// MOVIE
import NewMovie from '../views/movie/Create.vue'
import ShowMovie from '../views/movie/Show.vue'
import EditMovie from '../views/movie/Edit.vue'
import CategoryMovie from '../views/movie/Category.vue'
import GenreMovie from '../views/movie/Genre.vue'
import SearchMovie from '../views/movie/Search.vue'

export default {
    mode: 'history',
    linkActiveClass: 'active',
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    },
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/about',
            name: 'pages.about',
            component: About
        },
        {
            path: '/contact',
            name: 'pages.contact',
            component: Contact
        },
        {
            path: '/notes/create',
            name: 'notes.create',
            component: NewNote
        },
        {
            path: '/notes/table',
            name: 'notes.table',
            component: TableOfNotes
        },
        {
            path: '/notes/:subjectSlug/:noteSlug',
            name: 'notes.show',
            component: ShowTheNote
        },
        {
            path: '/notes/:subjectSlug/:noteSlug/edit',
            name: 'notes.edit',
            component: EditNote
        },
        {
            path: '/movies/create',
            name: 'movies.create',
            component: NewMovie
        },
        {
            path: '/movies/title/:slug',
            name: 'movies.show',
            component: ShowMovie,
            meta: { transition: 'fade-in-up' },
        },
        {
            path: '/movies/title/:slug/edit',
            name: 'movies.edit',
            component: EditMovie
        },
        {
            path: '/category/:slug',
            name: 'movies.category',
            component: CategoryMovie
        },
        {
            path: '/genre/:slug',
            name: 'movies.genre',
            component: GenreMovie
        },
        {
            path: '/search/:slug',
            name: 'movies.search',
            component: SearchMovie
        },
        {
            path: '/404',
            name: 'error.notfound',
            component: NotFound
        },
        {
            path: '*',
            redirect: '/404'
        }
    ]
}