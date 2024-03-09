function sendEmail() {
	Email.send({
		SecureToken : "5a65d30c-3209-45e3-b38b-7d04725f0c8a",
		To: 'vpbmtemails@gmail.com',
		From: "vpbaramaticonfessions@gmail.com",
		Subject: "Confession Received",
		Body: "By : "+document.getElementById("maill").value
                +"<br><br> For : "+document.getElementById("name").value
                +"<br> Confession : "+document.getElementById("message").value,
	})
		.then(function (message) {
		alert("Confessed Succesfully")
		});
	}

