import Vue from 'vue';
import Vuex from 'vuex';
import modules from './modules'

Vue.use(Vuex);

export default new Vuex.Store({
    modules,
    state: {
        user: {}
    },
    mutations: {
        SET_USER: (state, user) => state.user = user
    },
    actions: {
        setUser({ commit }, user) {
            commit('SET_USER', user)
        }
    },
    getters: {}
})