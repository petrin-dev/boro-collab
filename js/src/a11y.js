/* ACCESSIBILITY */

// Adding aria-label to logos linking to Homepage
let headerLogos = document.querySelectorAll('header a[href="/"]')
if (headerLogos) {
    headerLogos.forEach(function(each){
        each.ariaLabel = "Return to Homepage"
    })
}
let footerLogo = document.querySelector('footer a[href="/"]')
if (footerLogo) {
    footerLogo.ariaLabel = "Return to Homepage"
}

// Adding aria-label to images for Work Pages
let workClients = document.querySelectorAll('.work-client-item')
if (workClients) {
    workClients.forEach(function(each){
        let labelingText = each.querySelector('.label-link')
        let toBeLabeled = each.querySelector('.work-image a')
        toBeLabeled.ariaLabel = `Click to go to the ${labelingText.textContent} client page`
    })
}