<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['respuesta'])) {
        if ($_POST['respuesta'] == "Sí 💖") {
            header("Location: respuesta.php");
        } else {
            header("Location: respuesta_no.php");
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te Amo 💖</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            text-align: center;
            padding: 50px;
            color: white;
            overflow: hidden;
            background-color: #ff4d6d;
            position: relative;
        }
        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 4.5em;
            color: #fff;
            text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.5);
            animation: slideIn 3s ease-out;
        }
        @keyframes slideIn {
            0% { transform: translateY(-100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        p {
            font-size: 2em;
            color: #fff;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
            animation: fadeIn 3s ease-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .button {
            margin-top: 30px;
            padding: 15px 40px;
            font-size: 20px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
            background-color: #ff4081;
            box-shadow: 0 6px 15px rgba(255, 0, 129, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            animation: bounceIn 1s ease-out infinite, colorChange 3s infinite;
        }
        @keyframes bounceIn {
            0% { transform: translateY(20px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
        @keyframes colorChange {
            0% { background-color: #ff4081; }
            50% { background-color: #ff80ab; }
            100% { background-color: #ff4081; }
        }
        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 0, 129, 0.5);
        }
        /* Canvas Fondo */
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .floating-phrase {
            position: absolute;
            font-size: 2.5em;
            font-family: 'Dancing Script', cursive;
            color: #fff;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
            animation: float 4s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(20px); opacity: 0.8; }
            50% { transform: translateY(-20px); opacity: 1; }
            100% { transform: translateY(20px); opacity: 0.8; }
        }
        .heart-shape {
            position: absolute;
            font-size: 7em;
            top: 80%;
            right: 80%;
            transform: translateX(-50%);
            animation: heartBeat 1.5s ease-in-out infinite;
        }
        @keyframes heartBeat {
            0% { transform: scale(1); }
            25% { transform: scale(1.1); }
            50% { transform: scale(1); }
            75% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <canvas id="heartCanvas"></canvas>
    <audio autoplay loop>
        <source src="romantica.mp3" type="audio/mp3">
    </audio>
    <h1>Te Amo con todo mi corazón 💖</h1>
    <p>¡Eres mi todo, mi razón de ser!</p>

    <div class="floating-phrase" style="top: 20%; left: 10%;">Juntos somos invencibles</div>
    <div class="floating-phrase" style="top: 40%; left: 40%;">Tu amor me llena de alegría</div>
    <div class="floating-phrase" style="top: 60%; left: 70%;">No hay un solo día en el que no te ame más</div>

    <!-- Corazón animado -->
    <div class="heart-shape">❤️</div>

    <a href="index.php" class="button">Volver al Inicio</a>

    <script>
        // Fondo de corazones flotantes con animación impresionante
        const canvas = document.getElementById("heartCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const hearts = [];

        class Heart {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = canvas.height + Math.random() * 100;
                this.size = Math.random() * 10 + 5;
                this.speed = Math.random() * 2 + 1;
                this.alpha = Math.random() * 0.5 + 0.5;
            }

            draw() {
                ctx.fillStyle = `rgba(255, 192, 203, ${this.alpha})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }

            update() {
                this.y -= this.speed;
                if (this.y < -10) {
                    this.y = canvas.height + 10;
                    this.x = Math.random() * canvas.width;
                }
            }
        }

        function createHearts() {
            for (let i = 0; i < 150; i++) {
                hearts.push(new Heart());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            hearts.forEach((heart) => {
                heart.update();
                heart.draw();
            });
            requestAnimationFrame(animate);
        }

        createHearts();
        animate();

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>
