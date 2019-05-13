import EventDot from './EventDot';

const addEventButtons = stop => {
  const stopImageWrap = stop.querySelector('.stop__image-wrap');
  const stopImage = stop.querySelector('.stop__image');
  const events = stop.querySelectorAll('.event');
  const eventDots = Array.from(events).map(EventDot);
  const eventDotsWrap = document.createElement('ul');
  const insertedEventDotsWrap = stopImageWrap.appendChild(eventDotsWrap);
  insertedEventDotsWrap.classList.add('event-dots');
  eventDots.map(dot =>
    insertedEventDotsWrap.appendChild(dot)
  );
  const firstDot = stop.querySelector('.event-button');
  firstDot.classList.add('active');
  
};

export default addEventButtons;