<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- HTML -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>
    <!-- HTML -->
    <div>
        <video id="videoElement" controls></video>
        <button id="startButton">Mulai Rekaman</button>
        <button id="stopButton">Berhenti Rekaman</button>
        <button id="saveButton">Simpan Rekaman</button>
    </div>

    <!-- JavaScript -->
    <script>
        let mediaRecorder;
        let chunks = [];
        const videoElement = document.getElementById('videoElement');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const saveButton = document.getElementById('saveButton');

        // Mengatur media constraints untuk merekam video
        const mediaConstraints = {
            video: true
        };

        // Menggunakan getUserMedia untuk mengakses kamera pengguna
        navigator.mediaDevices.getUserMedia(mediaConstraints)
            .then(function(stream) {
                videoElement.srcObject = stream;
                mediaRecorder = new MediaRecorder(stream);

                // Menangani ketika media recorder telah merekam data
                mediaRecorder.ondataavailable = function(event) {
                    chunks.push(event.data);
                };
            })
            .catch(function(error) {
                console.error('Kamera tidak tersedia:', error);
            });

        // Menangani klik tombol mulai rekaman
        startButton.addEventListener('click', function() {
            mediaRecorder.start();
            console.log('Rekaman dimulai');
        });

        // Menangani klik tombol berhenti rekaman
        stopButton.addEventListener('click', function() {
            mediaRecorder.stop();
            console.log('Rekaman berhenti');
        });

        // Menangani klik tombol simpan rekaman
        saveButton.addEventListener('click', function() {
            const blob = new Blob(chunks, {
                type: 'video/webm'
            });

            // Membuat objek FormData untuk mengirim rekaman ke server
            const formData = new FormData();
            formData.append('video', blob);

            // Mengirim data rekaman ke server menggunakan AJAX (misalnya dengan menggunakan Axios)
            axios.post('/recordings', formData)
                .then(function(response) {
                    console.log('Rekaman berhasil diunggah');
                })
                .catch(function(error) {
                    console.error('Gagal mengunggah rekaman:', error);
                });
        });
    </script>

</body>

</html>
