document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new MmenuLight(
            document.querySelector("#my-menu"), "(max-width: 767px)"
        );
        var navigator = menu.navigation({
            title: 'Навигация'
        });
        var drawer = menu.offcanvas({
            // position: 'left'
        });
        document.querySelector('a[href="#my-menu"]')
            .addEventListener('click', evnt => {
                evnt.preventDefault();
                drawer.open();
            });
    }
)