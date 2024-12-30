import "./bootstrap";

import Alpine from "alpinejs";
import anchor from "@alpinejs/anchor";
import Webcam from 'webcam-easy';


Alpine.data("imagePreview", () => ({
    imgSrc: null,
    imagePreviewHandler(e) {
        const { files } = e.target;

        console.log(files);

        const reader = new FileReader();

        reader.onload = () => {
            this.imgSrc = reader.result;
        };

        reader.readAsDataURL(files[0]);
    },
}));

Alpine.data("webCamera", () => ({
    webCam: null,
    isStart : false,
    image :null,
    init() {
        const webCamEl = this.$refs.webCam;
        const canvasEl = this.$refs.canvas;
        const snapEl = this.$refs.snapSound;
        this.webCam = new Webcam(webCamEl, "user", canvasEl, snapEl);
        this.$watch('image', () => {
            console.log(this.image);
        });
    },

    start(){
        this.webCam.start();
        this.isStart = true;
    },
    stop(){
        this.webCam.stop();
        this.isStart = false;
    },
    capture (){
        this.image = this.webCam.snap()
        this.stop();
    },
    reset(){
        this.start();
        this.image = null;
    }
}));

window.Alpine = Alpine;
Alpine.plugin(anchor);

Alpine.start();
