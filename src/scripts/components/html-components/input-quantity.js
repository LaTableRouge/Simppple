export const inputNumber = () => {
	// Event to listen to (exemple: input ou change)
	const eventToListen = 'change'

	const inputNumberWrapper = document.querySelectorAll('.quantity')
	if (inputNumberWrapper.length) {
		inputNumberWrapper.forEach((wrapper) => {
			const inputNumber = wrapper.querySelector('input[type="number"]')
			if (inputNumber) {
				// Get the input attrs
				const max = parseFloat(inputNumber.getAttribute('max'))
				const min = parseFloat(inputNumber.getAttribute('min'))
				const step = inputNumber.getAttribute('step')

				// setup values for the disable of the min/max button
				const disabledMin = inputNumber.value <= min ? 'disabled' : ''
				const disabledMax = inputNumber.value >= max ? 'disabled' : ''

				// Append additionnal HTML
				const html = /* html */ `
        <div class="quantity-nav">
          <button class="quantity-button quantity-down" ${disabledMin}>-</button>
          <button class="quantity-button quantity-up" ${disabledMax}>+</button>
        </div>`
				inputNumber.insertAdjacentHTML('afterend', html)

				// Remove keyboard events (ENTER key)
				inputNumber.addEventListener('keydown', (e) => {
					if (!e) e = event
					if (e.code === 'Enter' || e.code === 'NumpadEnter') {
						e.preventDefault()
						e.stopImmediatePropagation()
						e.stopPropagation()
					}
				})

				const quantityUp = wrapper.querySelector('button.quantity-up')
				const quantityDown = wrapper.querySelector('button.quantity-down')
				if (quantityUp && quantityDown) {
					// Plus button events
					quantityUp.addEventListener('click', (e) => {
						e.preventDefault()

						const oldInputValue = inputNumber.valueAsNumber || 0
						let newInputValue = 0

						if (max) {
							if (oldInputValue >= max) {
								newInputValue = oldInputValue
							} else {
								if (step) {
									newInputValue = oldInputValue + Number(step)
								} else {
									newInputValue = oldInputValue + 1
								}
							}
						} else {
							if (step) {
								newInputValue = oldInputValue + Number(step)
							} else {
								newInputValue = oldInputValue + 1
							}
						}

						if (newInputValue >= max) {
							quantityUp.setAttribute('disabled', '')
						} else {
							quantityUp.removeAttribute('disabled')
						}

						// set of the new value
						inputNumber.value = newInputValue

						// Launch the event (for the listener)
						inputNumber.dispatchEvent(new Event(eventToListen))
					})

					// Minus button events
					quantityDown.addEventListener('click', (e) => {
						e.preventDefault()

						const oldInputValue = inputNumber.valueAsNumber || 0
						let newInputValue = 0

						if (min) {
							if (oldInputValue <= min) {
								newInputValue = oldInputValue
							} else {
								if (step) {
									newInputValue = oldInputValue - Number(step)
								} else {
									newInputValue = oldInputValue - 1
								}
							}
						} else {
							if (step) {
								newInputValue = oldInputValue - Number(step)
							} else {
								newInputValue = oldInputValue - 1
							}
						}

						// set of the new value
						inputNumber.value = newInputValue

						// Launch the event (for the listener)
						inputNumber.dispatchEvent(new Event(eventToListen))
					})

					// Disable/enable buttons
					inputNumber.addEventListener(eventToListen, () => {
						if (inputNumber.value >= max) {
							inputNumber.value = max
							quantityUp.setAttribute('disabled', '')
						} else {
							quantityUp.removeAttribute('disabled')
						}

						if (inputNumber.value <= min) {
							inputNumber.value = min
							quantityDown.setAttribute('disabled', '')
						} else {
							quantityDown.removeAttribute('disabled')
						}
					})
				}
			}
		})
	}
}
