<template>
    <div class="footer">
        <div class="container">
            <div
                class="row row-cols-sm-1 row-cols-md-5 gap-3 pt-5 pb-5 justify-content-center"
            >
                <div class="col list_style text-center p-3">
                    <h3>Scopri Deliveroo</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="nav-link"
                                >Investitori</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Chi siamo</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Ristoranti</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link">Altro</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Pressroom</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Il nostro blog</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Programmazione</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Design</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Lavora con noi</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Diventa nostro partner</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Note legali</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="nav-link"
                                >Termini & Condizioni</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Informativa sulla privacy</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Cookies</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Aiuto</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="nav-link"
                                >Contatti</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link">FAQ</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link"
                                >Tipi di cucina</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Porta Deliveroo con te</h3>
                    <div class="app_download">
                        <a href="#" target="_blank">
                            <img
                                class="img-fluid"
                                src="/../img/badge_apple.png"
                                alt="badge apple"
                            />
                        </a>

                        <a href="#" target="_blank">
                            <img
                                class="img-fluid"
                                src="/../img/badge_google.png"
                                alt="badge google"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
             <small
            >Copyright Team 5 - by Nicolas De Palma, Emanuele Scapaticci,
            Domenico Galileo, Roma Margine, Federico Capitani</small>
        </div>
    </div>
</template>

<script>
export default {
    name: "FooterComponent",
};
</script>

<style lang="scss" scoped>
.footer {
    background-image: url("/../img/bg-footer.webp");
    background-repeat: no-repeat;
    background-size: cover;
}

.list_style {
    background-color: rgb(203 200 197 / 88%);
    border-radius: 0.25rem;
    h3{
        color: #ff7f31;
    }
    a{
        color: rgb(0 0 0 / 50%);
    }

    li a{
        transition: all 0.5s;
    }

    li:hover a{
        color:white;
        filter: drop-shadow(2px 4px 6px #444444ad);
    
    }
}

.app_download img{
    padding-bottom: 1rem;
}

.footer_copyright{
    background-color: #444444ad;
    text-align: center;
    small{
        color: white;
        
    }
}
</style>
