// Pass
const passwordInput = document.querySelector('#password') as HTMLInputElement;
const passShowBtn = document.querySelector(
	'.pass .pass_visible_toggle_show'
) as HTMLButtonElement;
const passHiddenBtn = document.querySelector(
	'.pass .pass_visible_toggle_hidden'
) as HTMLButtonElement;

// Pass Confirmation
const passwordConfirmationInput = document.querySelector(
	'#password_confirmation'
) as HTMLInputElement;
const passConfirmationShowBtn = document.querySelector(
	'.pass_confirm .pass_visible_toggle_show'
) as HTMLButtonElement;
const passConfirmationHiddenBtn = document.querySelector(
	'.pass_confirm .pass_visible_toggle_hidden'
) as HTMLButtonElement;

if (passwordInput) {
	passShowBtn &&
		passShowBtn.addEventListener('click', () => {
			passwordInput.setAttribute('type', 'text');
			passShowBtn.style.display = 'none';
			passHiddenBtn.style.display = 'flex';
		});
	passHiddenBtn &&
		passHiddenBtn.addEventListener('click', () => {
			passwordInput.setAttribute('type', 'password');
			passShowBtn.style.display = 'flex';
			passHiddenBtn.style.display = 'none';
		});
}

if (passwordConfirmationInput) {
	passConfirmationShowBtn &&
		passConfirmationShowBtn.addEventListener('click', () => {
			passwordConfirmationInput.setAttribute('type', 'text');
			passConfirmationHiddenBtn.style.display = 'flex';
			passConfirmationShowBtn.style.display = 'none';
		});
	passConfirmationHiddenBtn &&
		passConfirmationHiddenBtn.addEventListener('click', () => {
			passwordConfirmationInput.setAttribute('type', 'password');
			passConfirmationHiddenBtn.style.display = 'none';
			passConfirmationShowBtn.style.display = 'flex';
		});
}
