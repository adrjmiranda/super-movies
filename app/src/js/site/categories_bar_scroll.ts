const categoriesBar = document.querySelector(
	'.categories_bar ul'
) as HTMLUListElement;

let isDown = false;
let startX: number;
let scrollLeft: number;

categoriesBar.addEventListener('wheel', (event: WheelEvent) => {
	event.preventDefault();
	categoriesBar.scrollLeft += event.deltaY * 0.5;
});

categoriesBar.addEventListener('touchstart', (event: TouchEvent) => {
	isDown = true;
	startX = event.touches[0].pageX - categoriesBar.offsetLeft;
	scrollLeft = categoriesBar.scrollLeft;
});

categoriesBar.addEventListener('touchmove', (event: TouchEvent) => {
	if (!isDown) return;
	event.preventDefault();
	const x = event.touches[0].pageX - categoriesBar.offsetLeft;
	const walk = (x - startX) * 1;
	categoriesBar.scrollLeft = scrollLeft - walk;
});

categoriesBar.addEventListener('touchend', (event: TouchEvent) => {
	isDown = false;
});

categoriesBar.addEventListener('touchcancel', (event: TouchEvent) => {
	isDown = false;
});
