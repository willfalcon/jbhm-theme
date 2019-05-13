import Flickity from 'flickity';

import addEventClickHandlers from './addEventClickHandlers';
import lazyLoadImages from './lazyLoadImages';
import addStopClickHandlers from './addStopClickHandlers';
import mobileYears from './mobileYears';

const initTimeline = timeline => {

  const flkty = new Flickity(timeline, {
    cellSelector: '.stop',
    imagesLoaded: true,
    pageDots: false,
    arrowShape: { 
      x0: 10,
      x1: 60, y1: 50,
      x2: 65, y2: 45,
      x3: 20
    },
    // draggable: false,
    cellAlign: 'center'
  });

  
  const stops = timeline.querySelectorAll('.stop');

  stops.forEach(stop => addStopClickHandlers(flkty, stop));
  stops.forEach(addEventClickHandlers);
  stops.forEach(lazyLoadImages);
  
  // TODO: moved the years buttons out of the slider, so I gotta control how they move manually.
  // Hook into flkty.on('change') and move them
  const stopButtons = document.querySelector('.stop__buttons');
  // mobileYears(0, stopButtons);
  // flkty.on('change', index => mobileYears(index, stopButtons));

}

export default initTimeline;