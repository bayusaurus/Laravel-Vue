import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        //LOGIN INFO
        authenticated: false,
        user: null,
        token: null,

        //FULL LOADER
        loader: false
    },
    getters: {
        //LOGIN INFO
        authenticated(state) {
            return state.authenticated
        },
        user(state) {
            return state.user
        },
        token(state) {
            return state.user
        },

        //FULL LOADER
        getLoader: state => {
            return state.loader;
        }
    },
    mutations: {
        //LOGIN INFO
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value
        },

        SET_USER(state, value) {
            state.user = value
        },
        SET_TOKEN(state, value) {
            state.token = value
        },

        //FULL LOADER
        SET_LOADER_ON(state) {
            state.loader = true;
        },
        SET_LOADER_OFF(state) {
            state.loader = false;
        }
    },
    // actions: {
    //     async signIn({ dispatch }, credentials) {
    //         await axios.get('/sanctum/csrf-cookie');
    //         await axios.post('/login', credentials);

    //         return dispatch('me');
    //     },

    //     async signOut({ dispatch }) {
    //         await axios.post('/logout')

    //         return dispatch('me')
    //     },

    //     me({ commit }) {
    //         return axios.get('/api/user').then((response) => {
    //             commit('SET_AUTHENTICATED', true)
    //             commit('SET_USER', response.data)
    //         }).catch(() => {
    //             commit('SET_AUTHENTICATED', false)
    //             commit('SET_USER', null)
    //         })
    //     }
    // }
})