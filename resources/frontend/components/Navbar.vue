<template>
    <div id="navbar-wrapper">
        <div class="web-header-banner pt-2 pb-2">
            <div class="container">
                <div class="d-flex justify-content-between branding-wrap">
                    <div class="ml-3 branding d-flex d-inline-block">
                        <img src="images/jdih.png" alt="" height="62px">
                        <div class="text-logo d-block ml-3">
                            <h4 class="display-6 text-uppercase text-info mb-0 pb-0">JDIH Kabupaten Tabalong</h4>
                            <h6 class="display-6 text-uppercase text-dark mt-0 pt-1">Jaringan Dokumentasi Informasi
                                Hukum</h6>
                        </div>
                    </div>
                    <img src="images/tabalong.png" alt="" height="62px">
                </div>
            </div>
        </div>
        <nav class="bg-primary">
            <div class="container">
                <input id="main-menu-state" type="checkbox"/>
                <label class="main-menu-btn" for="main-menu-state">
                    <span class="main-menu-btn-icon"></span> Toggle main menu visibility
                </label>

                <ul id="main-menu" class="sm sm-mint">
                    <li class="nav-item" v-for="(link, index) in links" v-if="link.type != 'dropdown'">
                        <router-link class="nav-link" :to="_halaman(link)">
                            {{link.menu_name}} <span class="sr-only"></span>
                        </router-link>
                    </li>
                    <li v-else>
                        <a class="nav-link" href="#">
                            {{link.menu_name}} <span class="sr-only"></span>
                        </a>
                        <navbar-item :link="link"></navbar-item>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    import NavbarItem from "../components/NavbarItem";

    export default {
        components: {
            NavbarItem
        },
        data() {
            return {
                links: ''
            }
        },
        created() {
            this.$http.get('/api/web-menu').then(res => {
                this.links = JSON.parse(res.data.value);
            })
        },
        mounted(){
            setTimeout(()=>{
                $(document).ready(function(){
                    $('#main-menu').smartmenus();
                    $(function () {
                        var $mainMenuState = $('#main-menu-state');
                        if ($mainMenuState.length) {
                            // animate mobile menu
                            $mainMenuState.change(function (e) {
                                var $menu = $('#main-menu');
                                if (this.checked) {
                                    $menu.hide().slideDown(250, function () {
                                        $menu.css('display', '');
                                    });
                                } else {
                                    $menu.show().slideUp(250, function () {
                                        $menu.css('display', '');
                                    });
                                }
                            });
                            // hide mobile menu beforeunload
                            $(window).on('beforeunload unload', function () {
                                if ($mainMenuState[0].checked) {
                                    $mainMenuState[0].click();
                                }
                            });
                        }
                    });
                })
            },1000)
        },
        methods: {
            _halaman(data) {
                var l = data.menu_link;
                if (l == null) {
                    l = '/';
                }
                if (data.type == 'halaman') {
                    return `/halaman/${l}`;
                } else {
                    return `/${l}`;
                }
            },
        },
    }
</script>

<style>
    .router-link-exact-active{
        background: #8db863!important;
    }
    .sm-mint a.highlighted{
        color: #FFFFFF !important;
        text-transform: uppercase;
        background: #634882 !important;
    }
    .sm-mint ul {
        border: 0;
        padding: 8px 0;
        background: #634882;
        border-radius: 0 4px 4px 4px;
        box-shadow: 0 4px 3px rgba(0,0,0,.25);
    }
    .sm-mint {
        border-top: 2px solid #8db863;
        border-bottom: 2px solid #8db863;
        background: #634882 !important;
    }
    .sm-mint ul a, .sm-mint ul a:active, .sm-mint ul a:focus, .sm-mint ul a:hover{
        font-size: 14px;
        border-left: 8px solid transparent;
        color: #FFFFFF !important;
        text-transform: uppercase;
        background: #634882;
    }
    .main-menu-btn {
        position: relative;
        display: inline-block;
        width: 28px;
        height: 28px;
        text-indent: 28px;
        white-space: nowrap;
        overflow: hidden;
        cursor: pointer;
        margin:10px;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    /* hamburger icon */
    .main-menu-btn-icon, .main-menu-btn-icon:before, .main-menu-btn-icon:after {
        position: absolute;
        top: 50%;
        left: 2px;
        height: 2px;
        width: 24px;
        background: #bbb;
        -webkit-transition: all 0.25s;
        transition: all 0.25s;
    }

    .main-menu-btn-icon:before {
        content: '';
        top: -7px;
        left: 0;
    }

    .main-menu-btn-icon:after {
        content: '';
        top: 7px;
        left: 0;
    }

    /* x icon */
    #main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon {
        height: 0;
        background: transparent;
    }

    #main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon:before {
        top: 0;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    #main-menu-state:checked ~ .main-menu-btn .main-menu-btn-icon:after {
        top: 0;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    /* hide menu state checkbox (keep it visible to screen readers) */
    #main-menu-state {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        border: 0;
        padding: 0;
        overflow: hidden;
        clip: rect(1px, 1px, 1px, 1px);
    }

    /* hide the menu in mobile view */
    #main-menu-state:not(:checked) ~ #main-menu {
        display: none;
    }

    #main-menu-state:checked ~ #main-menu {
        display: block;
    }

    @media (min-width: 768px) {
        /* hide the button in desktop view */
        .main-menu-btn {
            position: absolute;
            top: -99999px;
        }

        /* always show the menu in desktop view */
        #main-menu-state:not(:checked) ~ #main-menu {
            display: block;
        }
    }
</style>