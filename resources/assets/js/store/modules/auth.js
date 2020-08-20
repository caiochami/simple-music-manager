import router from '../../router'

export default {
    namespaced: true,
  
    state: {
      userData: null,
      isAuthenticated: false
    },
  
    getters: {
      user: state => state.userData,
      isAuthenticated (state) {
        return state.isAuthenticated;
        //return state.userData ? true : false;
      },      
    },
  
    mutations: {
      SET_USER(state, user) {
        state.userData = user
        state.isAuthenticated = true
        localStorage.setItem('user', JSON.stringify(user))
      },
      CLEAR (state){
        state.isAuthenticated = false
        state.userData = null 
        localStorage.clear()
      }
    },
  
    actions: {
      
      me ({ commit }) {
        
        return axios.get('/api/user').then((response) => {
          commit('SET_USER', response.data)
          router.push('/dashboard')
          commit("SET_IS_LOADING", false ,{ root: true });
        }).catch(() => {   
          commit('CLEAR');
          //console.log('me',router)
          router.push('/login')
          commit("SET_IS_LOADING", false ,{ root: true });
        })
      },
      async sendLoginRequest ({ commit, dispatch }, credentials) {
        commit("SET_IS_LOADING", true ,{ root: true });
        commit("SET_FORM_ERRORS", {}, { root: true })

        await axios.get('/sanctum/csrf-cookie')
        await axios.post('api/login', credentials).then( res => {
          localStorage.setItem("authToken", res.data.token);
        })
  
        return dispatch('me')
      },
      
      async sendRegisterRequest({ commit }, data) {
        commit("SET_FORM_ERRORS", {}, { root: true });
        commit("SET_IS_LOADING", true ,{ root: true });
        return axios
          .post("/api/register", data)
          .then(response => {
            commit("SET_IS_LOADING", false ,{ root: true });
            let token = response.data.token
            let user = response.data.user
            commit("SET_USER", user);       
            localStorage.setItem("authToken", token);
          });
      },
    
      async sendLogoutRequest ({ commit, dispatch }) {
        commit("SET_IS_LOADING", true ,{ root: true });
        await axios.post('/api/logout')
        .then( () => {
          commit('CLEAR')
          router.push('/login');
          dispatch('toast' , {type: "info", header: "200" ,body: "Você desconectou!"} , { root:true})
          commit("SET_IS_LOADING", false ,{ root: true });
        })
        
        //return dispatch('me')
      },
      sendVerifyResendRequest() {
        return axios.get("/api/email/resend");
      },
      sendVerifyRequest({ dispatch }, hash) {
        return axios
          .get("/api/email/verify/" + hash)
          .then(() => {
            dispatch("me");
          });
      }
    }
  };