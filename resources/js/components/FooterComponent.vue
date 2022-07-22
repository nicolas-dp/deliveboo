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
                            <a href="#" class="nav-link text-white-50"
                                >Investitori</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Chi siamo</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Ristoranti</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50">Altro</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Pressroom</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Il nostro blog</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Programmazione</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Design</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Lavora con noi</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Diventa nostro partner</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Note legali</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Termini & Condizioni</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Informativa sulla privacy</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Cookies</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Aiuto</h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Contatti</a
                            >
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50">FAQ</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white-50"
                                >Tipi di cucina</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="col list_style text-center p-3">
                    <h3>Porta Deliveroo con te</h3>
                    <div>
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
    background-color: #444444ad;
    border-radius: 0.25rem;
}

.footer_copyright{
    background-color: #444444ad;
    text-align: center;
    small{
        color: white;
    }
}
</style>
