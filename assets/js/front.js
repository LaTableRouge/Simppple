import '../scss/front.scss' // nécéssaire pour le Hot Module Reload

const titles = document.querySelectorAll('h3.style-scope.ytd-playlist-video-renderer')
if (titles.length) {
  titles.forEach(title => {
    if (title.innerHTML.includes('supprimée')) {
      console.log(title.innerHTML)
      const link = title.querySelector('> a')
      if (link) {
        console.log(link.href)
      }
    }
  })
}

