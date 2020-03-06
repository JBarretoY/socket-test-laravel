export default {
    namespaced: true,
    state: {
        project: {},
        chat: []
    },
    mutations: {
        SET_PROJECT: (state, project) => state.project = project,
        SET_CHAT: (state, chat) => state.chat = chat
    },
    actions: {
        setProject({ commit }, project) {
            commit('SET_PROJECT', project)
        },
        setChat({ commit }, chat) {
            commit('SET_CHAT', chat)
        }
    },
    getters: {}
}