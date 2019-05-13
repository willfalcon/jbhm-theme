const lazyLoadImages = stop => {
  const unloadedImages = stop.querySelectorAll('img[data-src]');
  unloadedImages.forEach(img => {
    const src = img.dataset.src;
    img.src = src;
  });
}

export default lazyLoadImages;