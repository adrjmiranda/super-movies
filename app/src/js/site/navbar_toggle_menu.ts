const navbarToggleMenu = document.querySelector(
	'.navbar_toggle_menu'
) as HTMLButtonElement;
const navbarMenu = document.querySelector('.navbar_menu') as HTMLDivElement;

navbarToggleMenu.addEventListener('click', () => {
	navbarMenu.classList.toggle('flex_show');
});
