document.addEventListener('DOMContentLoaded', () => {
	document.querySelector('#upload-form').addEventListener('submit', (event) => {
		event.preventDefault();
		/*const formData = new FormData();
		const photos = document.querySelector('input[type="file"][multiple]');

		formData.append('totalFiles', photos.files.length);
		let i = 1;
		for (const photo of photos.files) {
			//formData.append(`photos_${i}`, photo);
			formData.append(`photos`, photo);
			i++;
		}
		console.log(formData);
		let xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
			if (xhr.readyState == 4) {
				if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304) {
					console.log(JSON.parse(xhr.responseText));
				} else {
				console.log("Request was unsuccessful: " + xhr.status);
				}
			}
		};
	    xhr.open(document.querySelector('#upload-form').getAttribute('method'),document.querySelector('#upload-form').getAttribute('action'));
	    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
	    xhr.setRequestHeader('X-CSRF-TOKEN',document.querySelector('meta[name="csrf-token"]').content);
	    xhr.send(formData);
	    /*if ((xhr.status >= 200 && xhr.status < 300) || xhr.status == 304) {
			alert(xhr.responseText);
		} else {
			alert("Request was unsuccessful: " + xhr.status);
		}*/

		let imageFormData = new FormData();
		let imageInput = document.querySelector("input[type='file'][multiple]");
		for (let i = 0; i < imageInput.files.length; ++i) {
		imageFormData.append('file', imageInput.files[i]);
		}
        imageFormData.append('_method','POST');
		fetch(document.querySelector('#upload-form').getAttribute('action'), {
			method: document.querySelector('#upload-form').getAttribute('method'),
			body: imageFormData,
			headers: {
				'Content-Type': 'application/json;charset=utf-8',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
			},
		})
			.then((response) => response.json())
			.then((result) => {
				console.log('Success:', result);
			})
			.catch((error) => {
				console.error('Error:', error);
			});
	});
});



