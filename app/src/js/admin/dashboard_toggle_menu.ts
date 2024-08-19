const dashboardToggleMenuBtn = document.querySelector(
	'.dashboard_toggle_menu'
) as HTMLButtonElement;
const dashboardAside = document.querySelector(
	'.dashboard_aside'
) as HTMLDivElement;

let state = false;

dashboardToggleMenuBtn.addEventListener('click', () => {
	if (dashboardAside) {
		if (state) {
			dashboardAside.style.transform = 'translate(-100%, 0)';
			dashboardAside.style.position = 'absolute';
		} else {
			dashboardAside.style.transform = 'translate(0, 0)';
			dashboardAside.style.position = 'static';
		}

		state = !state;
	}
});
