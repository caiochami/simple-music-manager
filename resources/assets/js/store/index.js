import Vue from "vue";
import Vuex from "vuex";
//modules
import auth from './modules/auth'

Vue.use(Vuex);

const store =  new Vuex.Store({
  strict: true,
  state: {     
    isLoading: false,
    formErrors: [],
    error: null,

  },

  getters: {
   
    formErrors: state => state.formErrors,
    error: state => state.error,
    displayError: state => {
      if(state.error.response){
        return state.error.response.statusText
      }
      else if(state.error.request){
        return error.request.statusText;
      }
      else{
        return error.message
      }
    },
    isLoading: state => state.isLoading  

  },
  mutations: {
   
    SET_FORM_ERRORS: (state, errors) => {
      state.formErrors = errors;
    },
    SET_ERROR: (state, error) => {
      state.error = error;
    },
    SET_IS_LOADING: (state , value) => {
      state.isLoading = value;
    }
  },

  actions: {
   
  },

  modules: {     
      auth      
  }
});



export default store;
