/* ========================  P R E L O A D E R  ======================= */

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('preloader').classList.add('loaded');
        ready()
    });
} else {
    ready()
}








function ready() {

    /* ========================  S I D E B A R      T O G G L E ======================= */
    document.querySelector('.navbar-toggler').addEventListener('click', () => {
        document.querySelector('main').classList.add('open');
    })
    document.querySelector('.sidebar-overlay').addEventListener('click', () => {
        document.querySelector('main').classList.remove('open');
    })
    document.querySelector('#logout-btn').addEventListener('click', () => {
        document.querySelector('main').classList.remove('open');
    })

}




