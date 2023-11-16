export const pictureErrorHandler = () => {
  const imgs = document.querySelectorAll('img')
  if (imgs.length) {
    imgs.forEach((img) => {
      img.addEventListener('error', (e) => {
        e.target.classList.add('picture-not-found')
      })
    })
  }
}
