const dashboardToggleMenuBtn = document.querySelector(
	'.dashboard_toggle_menu'
) as HTMLButtonElement;
const dashboardAside = document.querySelector(
	'.dashboard_aside'
) as HTMLDivElement;

const dashboardCloseMenuBtn = document.querySelector(
	'.dashboard_close_menu'
) as HTMLButtonElement;

let state = false;

dashboardToggleMenuBtn.addEventListener('click', () => {
	let screenWidth = window.innerWidth;

	if (dashboardAside) {
		if (state) {
			if (screenWidth > 630) {
				dashboardAside.style.transform = 'translate(-100%, 0)';
				dashboardAside.style.position = 'fixed !important';
			}
		} else {
			if (screenWidth > 630) {
				dashboardAside.style.transform = 'translate(0, 0)';
				dashboardAside.style.position = 'static';
			} else {
				dashboardAside.style.transform = 'translate(0, 0)';
				dashboardAside.style.position = 'fixed !important';
				dashboardAside.style.zIndex = '1';
				dashboardAside.style.left = '0';
				dashboardAside.style.top = '0';
				dashboardAside.style.width = '100vw';
			}
		}

		state = !state;
	}
});

dashboardCloseMenuBtn.addEventListener('click', () => {
	if (dashboardAside) {
		if (state) {
			dashboardAside.style.transform = 'translate(-100%, 0)';
			dashboardAside.style.position = 'static';
			dashboardAside.style.width = 'unset';
		}

		state = !state;
	}
});
