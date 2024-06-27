import "./main.css";

const ogImgBtn = document.querySelector('#og-img-btn');
const ogImgCtr = document.querySelector('#og-img-preview');
const ogImgInput = document.querySelector('#ccb_og_image');

const mediaFrame = wp.media({
  title: 'Select or Upload Media',
  button: {
    text: 'Use this Media',
  },
  multiple: false,
});

ogImgBtn.addEventListener('click', (event) => {
  event.preventDefault();
  mediaFrame.open();
});

mediaFrame.on("select", () => {
  const attachment = mediaFrame.state().get("selection").first().toJSON();
  const imageSize = attachment.sizes.openGraph ? attachment.sizes.openGraph : attachment.sizes.thumbnail;
  ogImgCtr.src = imageSize.url;
  ogImgInput.value = imageSize.url;
});
