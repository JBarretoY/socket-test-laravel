export default {
    namespaced: true,
    state: {
        messages: []
    },
    mutations: {
        APPEND_MESSAGE: (state, message) => state.messages.push(message)
    },
    actions: {
        appendMessage({ commit }, message) {
            commit('APPEND_MESSAGE', message)
        }
    },
    getters: {}
}