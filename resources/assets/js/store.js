export default {
  state: {
    welcomeMessage: "Welcome to my app"
  },
  getters: {
    welcome(state){
      return state.welcomeMessage;
    }
  },
  mutations: {},

  actions: {}
}
