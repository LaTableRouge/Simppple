import { $ } from '../common/variables'

/*
 * Add a class to the body if the user has scrolled more than the parameter value
 * */
export const fixedHeader = (scrollValue = 200) => {
  $(window).scroll(function () {
    const $body = $('body')
    const scrollPositionY = $(window).scrollTop()

    if (scrollPositionY >= scrollValue) {
      $body.addClass('fixed-header')
    } else {
      $body.removeClass('fixed-header')
    }
  })
}

/*
 * Pass the header height to the document css
 * */
export const getHeaderHeight = () => {
  const header = document.querySelector('body > .wp-site-blocks > header')
  if (header) {
    document.documentElement.style.setProperty('--header-height', `${Math.round(header.getBoundingClientRect().height)}px`)
  }

  let timeout = false
  window.addEventListener('resize', () => {
    if (timeout) {
      window.cancelAnimationFrame(timeout)
    }

    timeout = window.requestAnimationFrame(() => {
      const header = document.querySelector('body > .wp-site-blocks > header')
      if (header) {
        document.documentElement.style.setProperty('--header-height', `${Math.round(header.getBoundingClientRect().height)}px`)
      }
    })
  })
}
