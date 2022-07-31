<template>
  <div class="footer">
    <div class="container">
      <div
        class="
          row row-cols-1 row-cols-md-3 row-cols-lg-4
          gap-5
          py_5
          justify-content-center
        "
      >
        <div class="col list_style text-center p-3">
          <h3>Scopri Deliveroo</h3>
          <ul class="list-unstyled">
            <li>
              <a href="#" class="nav-link">Investitori</a>
            </li>
            <li>
              <a href="#" class="nav-link">Chi siamo</a>
            </li>
            <li>
              <a href="#" class="nav-link">Ristoranti</a>
            </li>
            <li>
              <a href="#" class="nav-link">Altro</a>
            </li>
            <li>
              <a href="#" class="nav-link">Pressroom</a>
            </li>
            <li>
              <a href="#" class="nav-link">Il nostro blog</a>
            </li>
            <li>
              <a href="#" class="nav-link">Programmazione</a>
            </li>
            <li>
              <a href="#" class="nav-link">Design</a>
            </li>
            <li>
              <a href="#" class="nav-link">Lavora con noi</a>
            </li>
            <li>
              <a href="#" class="nav-link">Diventa nostro partner</a>
            </li>
          </ul>
        </div>
        <div class="col list_style text-center p-3">
          <h3>Note legali</h3>
          <ul class="list-unstyled">
            <li>
              <a href="#" class="nav-link">Termini & Condizioni</a>
            </li>
            <li>
              <a href="#" class="nav-link">Informativa sulla privacy</a>
            </li>
            <li>
              <a href="#" class="nav-link">Cookies</a>
            </li>
          </ul>

          <h3 class="pt-3">Aiuto</h3>
          <ul class="list-unstyled">
            <li>
              <a href="#" class="nav-link">Contatti</a>
            </li>
            <li>
              <a href="#" class="nav-link">FAQ</a>
            </li>
            <li>
              <a href="#" class="nav-link">Tipi di cucina</a>
            </li>
          </ul>
        </div>

        <div class="col text-center app_download pt-3">
          <a href="https://www.apple.com/app-store/" target="_blank">
            <img
              class="img-fluid"
              src="/../img/badge_apple.png"
              alt="badge apple"
            />
          </a>

          <a
            href="https://play.google.com/store/apps?gl=IT&utm_source=emea_Med&utm_medium=hasem&utm_content=May2021&utm_campaign=Evergreen&pcampaignid=MKT-EDR-emea-it-1001280-Med-hasem-ap-Evergreen-May2021-Text_Search_BKWS-test_ctrl_RSA%7cONSEM_kwid_43700007669440913&gclid=Cj0KCQjwuO6WBhDLARIsAIdeyDI5Qka_wn_D6f_64b0Kf0WC07FQXwc2h_lyyNd3z6L-0sPVSSWU2O0aAjd0EALw_wcB&gclsrc=aw.ds"
            target="_blank"
          >
            <img
              class="img-fluid"
              src="/../img/badge_google.png"
              alt="badge google"
            />
          </a>
        </div>
      </div>
    </div>
    <img
      class="w-100 pb-3"
      src="https://cwa.roocdn.com/_next/static/media/merch-itemrow@2x.09d506d7.svg"
      alt=""
    />
    <div class="footer_copyright">
      <small
        >Copyright Team 5 - by Nicolas De Palma, Emanuele Scapaticci, Domenico
        Galileo, Roma Margine, Federico Capitani</small
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "FooterComponent",
};
</script>

<style lang="scss" scoped>
.py_5 {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

.footer {
  background-image: linear-gradient(to bottom, white, #f0f1f1, #abaaaa);
  ul {
    line-height: 0.7;
  }

  .list_style {
    background-color: white;
    border-radius: 0.25rem;
    box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
    h3 {
      color: #ff7f31;
    }
    a {
      color: rgb(0 0 0 / 50%);
    }

    li a {
      transition: all 0.4s;
    }

    li:hover a {
      color: #ff7f31;
      filter: drop-shadow(1px 1px 2px #818181ad);
    }
  }

  .app_download img {
    width: 50%;
    padding-bottom: 1rem;
    border-radius: 0.25rem;
    transition: all 0.7s;
    &:hover {
      transform: scale(1.1);
      filter: drop-shadow(2px 4px 6px #444444ad);
    }
  }

  .footer_copyright {
    background-color: #ff7f31;
    text-align: center;
    small {
      color: white;
      font-weight: bold;
    }
  }
}
</style>
