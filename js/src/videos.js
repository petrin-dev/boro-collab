if (document.querySelector('.is-style-play-button-hl')) {
    createModal()
    let playButton = document.querySelectorAll('.is-style-play-button-hl a')
    playButton.forEach(function(each){
        let videoLink = each.href
        each.removeAttribute('href')
        each.addEventListener('click',function(click){
            populateModal(videoLink)
        })
    })
}

if (document.querySelector('.is-style-play-button-hd')) {
    createModal()
    let playButton = document.querySelectorAll('.is-style-play-button-hd a')
    playButton.forEach(function(each){
        let videoLink = each.href
        each.removeAttribute('href')
        each.addEventListener('click',function(click){
            populateModal(videoLink)
        })
    })
}

if (document.querySelector('.is-style-play-button-image')) {
    createModal()
    let playImages = document.querySelectorAll('.is-style-play-button-image a')
    playImages.forEach(function(each){
        let videoLink = each.href
        each.removeAttribute('href')
        each.addEventListener('click',function(click){
            populateModal(videoLink)
        })
    })
}

function createModal() {
    let footer = document.querySelector('footer.wp-block-template-part')
    let videoModal = document.createElement('dialog')
    videoModal.classList.add('video-modal')
    videoModal.addEventListener('click',function(click){
        videoModal.close()
        while (videoModal.childNodes.length > 0) {
            videoModal.removeChild(videoModal.firstChild)
        }
        document.body.classList.remove('no-scroll')
    })
    footer.appendChild(videoModal)
}

function populateModal(video) {
    video = video.replace('watch?v=','embed/')
    let videoModal = document.querySelector('footer.wp-block-template-part dialog.video-modal')
    while (videoModal.childNodes.length > 0) {
        videoModal.removeChild(videoModal.firstChild)
    }
    let videoFrame = document.createElement('iframe')
    videoFrame.setAttribute('id','video-frame')
    videoFrame.setAttribute('frameborder',0)
    videoFrame.setAttribute('scrolling','no')
    videoFrame.setAttribute('type','text/html')
    videoFrame.setAttribute('src',video)
    videoFrame.setAttribute('allowfullscreen', true)
    videoModal.appendChild(videoFrame)
    videoModal.showModal()
    document.body.classList.add('no-scroll')
}