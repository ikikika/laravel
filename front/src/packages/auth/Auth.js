export default function (Vue){
  Vue.auth = {
    //set token
    setToken: (token, expiration) => {
      localStorage.setItem('token', token);
      localStorage.setItem('expiration', token);
    },

    //get token
    getToken: () => {

    },

    //destroy token

    // isAuthenticated
    isAuthenticated: () => {
      if( this.getToken ){
        return true;
      } else {
        return false;
      }
    }
  }
}
