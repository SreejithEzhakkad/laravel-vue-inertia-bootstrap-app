import { createStore } from "vuex";
export default createStore({
    namespaced: true,
    state: {
        auth: null,
        toast: null
    },
    getters: {
        auth(state) {
            return state.auth;
        },
        toast(state) {
            return state.toast;
        }
    },
    mutations: {
        SET_AUTH(state, auth){
            state.auth = auth;
        },
        SET_TOAST (state, toast){
            state.toast = toast;
        }
    },
    actions: {
        setAuth: ({commit},auth) => {
            commit('SET_AUTH', null ?? auth.user);
        },
        showToast: ({commit, state},status) => {
            commit('SET_TOAST', {...status,id:Date.now()});
        }
    },
    modules: {},
});
