const EventDot = (item, i) => {
  const li = document.createElement('li');
  li.classList.add('event-dot');
  const button = document.createElement('button');
  button.classList.add('event-button');
  button.dataset.eventIndex = i;
  li.appendChild(button);
  return li;
};

export default EventDot;