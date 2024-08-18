// Pass
const passwordInputAdmin = document.querySelector(
	'#password'
) as HTMLInputElement;
const passShowBtnAdmin = document.querySelector(
	'.pass .pass_visible_toggle_show'
) as HTMLButtonElement;
const passHiddenBtnAdmin = document.querySelector(
	'.pass .pass_visible_toggle_hidden'
) as HTMLButtonElement;

// Pass Confirmation
const passwordConfirmationInputAdmin = document.querySelector(
	'#password_confirmation'
) as HTMLInputElement;
const passConfirmationShowBtnAdmin = document.querySelector(
	'.pass_confirm .pass_visible_toggle_show'
) as HTMLButtonElement;
const passConfirmationHiddenBtnAdmin = document.querySelector(
	'.pass_confirm .pass_visible_toggle_hidden'
) as HTMLButtonElement;

if (passwordInputAdmin) {
	passShowBtnAdmin &&
		passShowBtnAdmin.addEventListener('click', () => {
			passwordInputAdmin.setAttribute('type', 'text');
			passShowBtnAdmin.style.display = 'none';
			passHiddenBtnAdmin.style.display = 'flex';
		});
	passHiddenBtnAdmin &&
		passHiddenBtnAdmin.addEventListener('click', () => {
			passwordInputAdmin.setAttribute('type', 'password');
			passShowBtnAdmin.style.display = 'flex';
			passHiddenBtnAdmin.style.display = 'none';
		});
}

if (passwordConfirmationInputAdmin) {
	passConfirmationShowBtnAdmin &&
		passConfirmationShowBtnAdmin.addEventListener('click', () => {
			passwordConfirmationInputAdmin.setAttribute('type', 'text');
			passConfirmationHiddenBtnAdmin.style.display = 'flex';
			passConfirmationShowBtnAdmin.style.display = 'none';
		});
	passConfirmationHiddenBtnAdmin &&
		passConfirmationHiddenBtnAdmin.addEventListener('click', () => {
			passwordConfirmationInputAdmin.setAttribute('type', 'password');
			passConfirmationHiddenBtnAdmin.style.display = 'none';
			passConfirmationShowBtnAdmin.style.display = 'flex';
		});
}
