const addEventClickHandlers = stop => {
  const eventButtons = stop.querySelectorAll('.event-button');
  const events = stop.querySelectorAll('.event');
  const eventListButtons = stop.querySelectorAll('.event button');

  // console.log({eventButtons, eventListButtons});

  const goToEvent = e => {
    const index = parseInt(e.target.dataset.eventIndex);
    // console.log({ e, index });
    const currentEvent = stop.querySelector('.event.active');
    const newEvent = events[index];
    const currentEventButton = stop.querySelector('.event-button.active');
    const newEventButton = eventButtons[index];

    currentEvent.classList.remove('active');
    newEvent.classList.add('active');
    currentEventButton.classList.remove('active');
    newEventButton.classList.add('active');

    const currentImage = stop.querySelector('.stop__image.active');
    const newImage = stop.querySelector(`.stop__image[data-event-index="${index}"]`);

    if (newImage) swapImages(currentImage, newImage);

  };

  eventButtons.forEach(button => {
    // console.log(button);
    button.addEventListener('click', goToEvent);
  });
  eventListButtons.forEach(button => button.addEventListener('click', goToEvent));

}

function swapImages(currentImage, newImage) {

  const endOfTransition = e => {
    currentImage.classList.remove('active');
    newImage.removeEventListener('transitionend', endOfTransition);
    newImage.classList.add('active');
    // currentImage.style.opacity = '0';
  };

  newImage.addEventListener('transitionend', endOfTransition);
  newImage.style.display = 'block';
  currentImage.style.opacity = '0';
  setTimeout(() => (newImage.style.opacity = '1'), 0);
    
}

export default addEventClickHandlers;