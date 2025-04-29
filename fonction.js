// Fonction pour afficher l'image sélectionnée dans le champ de téléchargement de fichier

    function previewImage() {
  const fileInput = document.getElementById('fileInput');
  const file = fileInput.files[0];
  const imagePreviewContainer = document.getElementById('previewImageContainer');
  
  if(file.type.match('image.*')){
    const reader = new FileReader();
    
    reader.addEventListener('load', function (event) {
      const imageUrl = event.target.result;
      const image = new Image();
      
      image.addEventListener('load', function() {
        imagePreviewContainer.innerHTML = ''; // Vider le conteneur au cas où il y aurait déjà des images.
        imagePreviewContainer.appendChild(image);
      });
      
      image.src = imageUrl;
      image.style.width = '70px'; // Indiquez les dimensions souhaitées ici.
      image.style.height = 'auto'; // Vous pouvez également utiliser "px" si vous voulez spécifier une hauteur.
    });
    
    reader.readAsDataURL(file);
  }
}