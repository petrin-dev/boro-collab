if (document.querySelector('.mental-health-subpage-menu')) {
    let mhToggle = document.querySelector('.mh-nav-toggle')
    let mhSubnav = document.querySelector('.mental-health-subpage-menu')
    mhToggle.addEventListener('click',function(click){
        mhToggle.classList.toggle('toggled')
        mhSubnav.classList.toggle('open')
    })
}