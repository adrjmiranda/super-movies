import EmblaCarousel from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

const emblaNode = document.querySelector(
	'.featured_movies_slides'
) as HTMLDivElement;
const options = { loop: false };
const plugins = [Autoplay()];

const emblaApi = EmblaCarousel(emblaNode, options, plugins);

emblaApi.slideNodes();
