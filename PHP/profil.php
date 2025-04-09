<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document</title>
	</head>
	<body>
		<form
			action="upload_profile_pic.php"
			method="post"
			enctype="multipart/form-data"
		>
			<label for="avatar">Choisir une photo de profil :</label>
			<input
				type="file"
				name="avatar"
				id="avatar"
				accept="image/*"
				required
			/>
			<button type="submit">Télécharger</button>
		</form>
	</body>
</html>
