if (document.querySelector('.footer-network-toggle')) {
    let networkToggle = document.querySelector('.footer-network-toggle')
    let networkLinks = document.querySelector('.footer-network-links')
    networkToggle.addEventListener('click',function(click){
        networkToggle.classList.toggle('toggled')
        networkLinks.classList.toggle('open')
    })
}