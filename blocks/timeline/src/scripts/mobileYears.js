const mobileYears = (index, stopButtons) => {
  
  const { width } = stopButtons.getBoundingClientRect;
  const stops = stopButtons.querySelectorAll('.cell-width');
  stopButtons.style.transform = `translateX(-${width / stops.length}%)`;

  const thisStop = stops[index];
  const thisStopButton = thisStop.querySelector('.stop__button');
  thisStopButton.style.transform = 'translateX(-50%)';

  if (index > 0) {
    const prev = stops[index - 1];
    const prevYear = prev.querySelector('.stop__button');
    prevYear.style.transform = 'translateX(calc(-50% + 60vw))';
  }

  if (index < stops.length - 1) {
    const next = stops[index + 1];

    const nextYear = next.querySelector('.stop__button');
    nextYear.style.transform = 'translateX(calc(-50% - 60vw))';
  }
};

export default mobileYears;