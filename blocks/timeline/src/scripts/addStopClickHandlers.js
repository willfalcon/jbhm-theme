
const addStopClickHandlers = (flkty, stop) => {

  const imageWrap = stop.querySelector('.stop__image-wrap');
  const yearButtons = document.querySelectorAll('.stop__button');
  
  yearButtons.forEach(yearButton => {

    yearButton.addEventListener('click', e => {
      const index = parseInt(e.target.dataset.stopIndex);
      flkty.select(index);
    });
  });

  const selectSlide = e => {
    const wrap = e.target.parentNode;
    if (!wrap.parentNode.classList.contains('is-selected')) {
      const index = parseInt(wrap.parentNode.dataset.stopIndex);
      flkty.select(index);
    }
  };

  imageWrap.addEventListener('click', selectSlide);

}

export default addStopClickHandlers;