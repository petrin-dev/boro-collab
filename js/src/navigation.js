window.addEventListener("load", (event) => {
    let topLevelPages = document.querySelectorAll('.meganav-parent > a')
    topLevelPages.forEach(function(each){
        let currentPage = window.location.href
        if (currentPage.includes(each.href)) {
            each.classList.add('active-page')
        }
    })
  })

window.onscroll = function() { stickyScroll() }

function stickyScroll() {
    let headerWrap = document.querySelector('.header-wrap')
    let topRowMenu = document.querySelector('.top-row-menu')
    let meganav = document.querySelector('.meganav')
    let scrollingDesktopToggle = document.querySelector('.scrolling-desktop-toggle')
    if (window.pageYOffset) {
        // console.log('im not on top')
        headerWrap.classList.add('scrolling')
        if (scrollingDesktopToggle) {
            scrollingDesktopToggle.classList.remove('hidden')
        }
    } else {
        // console.log('im on top')
        headerWrap.classList.remove('scrolling')
        headerWrap.classList.remove('menu-toggled')
        if (topRowMenu) {
            topRowMenu.style.maxHeight = ''
        }
        meganav.style.display = ''
    }
}

if (document.querySelector('.scrolling-menu-toggle')) {
    let scrollingMenuToggle = document.querySelector('.scrolling-menu-toggle')
    scrollingMenuToggle.addEventListener('click',function(event){
        let headerWrap = document.querySelector('.header-wrap')
        headerWrap.classList.add('menu-toggled')
        let topRowMenu = document.querySelector('.top-row-menu')
        topRowMenu.style.maxHeight = '300px'
        let meganav = document.querySelector('.meganav')
        meganav.style.display = 'flex'
        let scrollingDesktopToggle = document.querySelector('.scrolling-desktop-toggle')
        scrollingDesktopToggle.classList.add('hidden')
    })
}

if (document.querySelector('.mobile-menu-toggle')) {
    let mobileMenuToggle = document.querySelector('.mobile-menu-toggle')
    mobileMenuToggle.addEventListener('click',function(event){
        let headerWrap = document.querySelector('.header-wrap')
        let toggle = mobileMenuToggle.querySelector('.toggler')
        if (headerWrap.classList.contains('menu-toggled')) {
            headerWrap.classList.remove('menu-toggled')
            document.body.classList.remove('no-scroll')
            toggle.checked = false
        } else {
            headerWrap.classList.add('menu-toggled')
            document.body.classList.add('no-scroll')
            toggle.checked = true
        }
    })
}

if (document.querySelectorAll('.meganav-subnav-toggle')) {
    let mobileSubnavToggles = document.querySelectorAll('.meganav-subnav-toggle')
    mobileSubnavToggles.forEach(function(each){
        each.addEventListener('click',function(event){
            each.classList.toggle('toggled')
            let closestMenu = each.parentNode.querySelector('.meganav-subnav')
            closestMenu.classList.toggle('open')
        })
    })
}