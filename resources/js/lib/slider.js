document.addEventListener('DOMContentLoaded', function () {
    const line = document.querySelector('.slider-content')
    const items = document.querySelectorAll('.slider-item')
    const next = document.querySelector('.slider-btn.next')
    const prev = document.querySelector('.slider-btn.previous')

    line.classList.add('animated')

    let count = 0;
    let width;

    function init() {
        width = line.clientWidth
        items.forEach(item => item.style.width = width + 'px')
        rollSlider()
    }

    function rollSlider() {
        if (count > items.length - 1) count = 0
        if (count < 0) count = items.length - 1
        line.style.transform = `translateX(-${count * width}px)`
    }

    next.addEventListener('click', function () {
        count++
        rollSlider()
    })

    prev.addEventListener('click', function () {
        count--
        rollSlider()
    })

    window.addEventListener('resize', init)
    init()

    //swipe slider
    isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    if (isMobile) {
        let x1 = null
        line.addEventListener('touchstart', handleTouchStart, false)
        line.addEventListener('touchmove', handleTouchMove, false)

        function handleTouchStart(event) {
            x1 = event.touches[0].clientX
        }

        function handleTouchMove(event) {
            if (!x1) return false

            let x2 = event.touches[0].clientX
            let xDiff = x2 - x1

            if (xDiff > 0)
                count--
            else
                count++

            rollSlider()
            x1 = null
        }
    }
})