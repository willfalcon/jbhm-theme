import './timeline-styles.scss';

import initTimeline from './scripts/initTimeline';

const timelines = document.querySelectorAll('.timeline');

timelines.forEach(initTimeline);
