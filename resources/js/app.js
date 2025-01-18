import "./bootstrap";

import Alpine from "alpinejs";
import anchor from "@alpinejs/anchor";
import Webcam from "webcam-easy";

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
    isStart: false,
    image: null,
    init() {
        const webCamEl = this.$refs.webCam;
        const canvasEl = this.$refs.canvas;
        const snapEl = this.$refs.snapSound;
        this.webCam = new Webcam(webCamEl, "user", canvasEl, snapEl);
        this.$watch("image", () => {
            console.log(this.image);
        });
    },

    start() {
        this.webCam.start();
        this.isStart = true;
    },
    stop() {
        this.webCam.stop();
        this.isStart = false;
    },
    capture() {
        this.image = this.webCam.snap();
        this.stop();
    },
    reset() {
        this.start();
        this.image = null;
    },
}));

Alpine.data("fileUploadHandler", () => ({
    files: [],
    handleFiles(event) {
        const selectedFiles = Array.from(event.target.files);
        selectedFiles.forEach((file) => {
            this.files.push({
                name: file.name,
                size: file.size,
                type: file.type,
                url: file.type.startsWith("image/")
                    ? URL.createObjectURL(file)
                    : "",
                file: file,
            });
        });
        // IMPORTANT: Don't reset event.target.value
    },
    removeFile(index) {
        this.files.splice(index, 1);
    },
}));

Alpine.data("pieChart", () => ({
    chart: null,
    init() {
        // Fetch task data from the backend

        const labels = ["pending", "done", "in progress"]; // Status labels
        const taskCounts = [30, 20, 25]; // Task counts

        const ctx = this.$refs.chart.getContext("2d");

        this.chart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Tasks by Status",
                        data: taskCounts,
                        backgroundColor: [
                            "#4CAF50", // Completed
                            "#FFC107", // In Progress
                            "#F44336", // Pending
                            "#2196F3", // Other
                        ],
                        borderColor: "#ffffff",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw} tasks`;
                            },
                        },
                    },
                },
            },
        });
    },
    update(data) {

        this.chart.data.labels = Object.keys(data);
        this.chart.data.datasets[0].data = Object.values(data);

        this.chart.update();
    },
}));

window.Alpine = Alpine;
Alpine.plugin(anchor);

Alpine.start();
