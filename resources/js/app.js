import './bootstrap';

import Alpine from 'alpinejs';
import anchor from '@alpinejs/anchor'


Alpine.data('imagePreview', () => ({
    imgSrc : null,
    imagePreviewHandler(e){
        const {files} = e.target;


        console.log(files);

        const reader = new FileReader();

        reader.onload = () => {
          this.imgSrc = reader.result
        }


        reader.readAsDataURL(files[0]);
    }
}))

window.Alpine = Alpine;
Alpine.plugin(anchor)

Alpine.start();
