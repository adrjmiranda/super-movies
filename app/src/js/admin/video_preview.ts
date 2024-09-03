const movieFileInput = document.querySelector(
	'#movie_file_input'
) as HTMLInputElement;
const videoPreviewDiv = document.querySelector(
	'#video_preview'
) as HTMLVideoElement;

movieFileInput &&
	movieFileInput.addEventListener('change', (event: Event) => {
		const target = event.target as HTMLInputElement;
		const file = target.files?.[0];

		if (file) {
			const videoUrl = URL.createObjectURL(file);
			videoPreviewDiv.src = videoUrl;
			videoPreviewDiv.style.display = 'block';
			videoPreviewDiv.load();
		}
	});
