<template>
  <div class="header">
    <nav class="navbar navbar-expand-md shadow-sm navbar-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"
          ><img
            height="50"
            src="/../img/logo-deliveroo.png"
            alt="logo deliveroo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'home' }"
                >Home</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'about' }"
                >About</router-link
              >
            </li>
          </ul>

          <div class="my-2 my-lg-0">
            <ul
              class="navbar-nav ml-auto d-flex justify-content-around flex-row"
            >
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'checkout' }">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-cart-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                    />
                  </svg>
                </router-link>
              </li>
              <li class="nav-item" v-if="user_name">
                <a class="nav-link" href="/admin" ><i class="fa-solid fa-user pe-2"></i> {{user_name}} </a>
              </li>
              <li class="nav-item" v-else>
                <a class="nav-link" href="/admin" >Accedi</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      user_name: null
    };
  },
  methods: {
    getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(";");
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    },

    //document.write("n" + readCookie('site'));

    checkCookie() {
      let username = this.getCookie("user_logged");
      if (username != "") {
        this.user_name = username;
      } else {
        //username = prompt("Please enter your name:", "");
/*         if (username != "" && username != null) {
          setCookie("username", username, 365);
        } */
      }
    },
  },

  mounted() {
    //console.log(`cokkie: ${this.getCookie("user_logged")}`);
    //console.log(`cokkie: ${(document.cookie = "user_logged")}`);
    console.log(`cokkie: ${this.getCookie("user_logged")}`);

    this.checkCookie();
  },
};
</script>

<style lang="scss" scoped>
.navbar {
  background-color: #ff7f31;
  padding-bottom: 0.6rem;
  a {
    color: white !important;
    font-weight: bold;
    transition: all 0.5s;
    &:hover {
      filter: drop-shadow(2px 4px 6px black);
    }
  }
}
</style>
