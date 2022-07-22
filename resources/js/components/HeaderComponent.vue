<template>
    <div class="header">
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="/"
                    ><img
                        height="70"
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
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'home' }"
                                >Home</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'about' }"
                                >About</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'restaurants' }"
                                >Restaurants</router-link
                            >
                        </li>
                    </ul>

                    <div class="my-2 my-lg-0">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
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
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Accedi</a>
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
};
</script>

<style lang="scss" scoped>
.navbar {
    background-color: #ffa700;

    a {
        color: white !important;
        font-weight: bold;
        &:hover {
            filter: drop-shadow(2px 4px 6px black);
        }
    }
}
</style>
