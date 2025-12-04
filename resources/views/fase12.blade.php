<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Batalha Final</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        :root {
            --dark: #05010a;
            --purple: #7a1cff;
            --blue: #00aaff;
            --neon: 0 0 12px;
        }

        body {
            margin: 0;
            height: 100vh;
            background: radial-gradient(circle at center, #1a0033, #000009, #000000);
            font-family: 'Orbitron', sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            width: 160%;
            height: 160%;
            top: -30%;
            left: -30%;
            background: radial-gradient(circle, rgba(120,0,255,0.4), transparent 70%),
                        radial-gradient(circle at 70% 40%, rgba(0,140,255,0.25), transparent 70%);
            filter: blur(120px);
            z-index: -1;
            animation: glowmove 14s infinite alternate ease-in-out;
        }

        @keyframes glowmove {
            from { transform: translate(-40px, -40px); }
            to   { transform: translate(40px, 40px); }
        }

        .container {
            width: 90%;
            max-width: 600px;
            padding: 30px;
            background: rgba(5, 0, 15, 0.8);
            border: 1px solid rgba(120, 0, 255, 0.4);
            border-radius: 14px;
            box-shadow: 0 0 25px rgba(140, 0, 255, 0.4);
            backdrop-filter: blur(8px);
            text-align: center;
        }

        h2 {
            font-size: 32px;
            color: var(--purple);
            text-shadow: var(--neon) var(--purple);
            margin-bottom: 25px;
        }

        .player-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 35px;
        }

        .player-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--purple);
            margin-bottom: 15px;
        }

        .player-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .player-name {
            font-size: 18px;
            letter-spacing: 2px;
        }

        .btn {
            background: linear-gradient(90deg, var(--purple), var(--blue));
            padding: 15px 28px;
            border-radius: 10px;
            border: none;
            color: white;
            font-size: 17px;
            letter-spacing: 2px;
            cursor: pointer;
            transition: .3s;
            box-shadow: 0 0 15px var(--purple);
            text-transform: uppercase;
        }

        .btn:hover {
            transform: scale(1.08);
            box-shadow: 0 0 25px var(--purple);
        }

        .victory-message {
            display: none;
            font-size: 28px;
            color: #00ff99;
            text-shadow: 0 0 20px #00ff99;
            margin-top: 30px;
            animation: fadeIn 2s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Batalha Final</h2>

        <div class="player-info">
            <div class="player-avatar" id="player-avatar"></div>
            <div class="player-name" id="player-name"></div>
        </div>

        <button class="btn" id="start-battle-btn">Iniciar Batalha</button>

        <div class="victory-message" id="victory-message">
            🎉 Parabéns! Você venceu a Batalha Final! 🎉
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const playerName = localStorage.getItem("playerName") || "Jogador";
            const characterPhoto = localStorage.getItem("selectedCharacterPhoto") || "";
            const characterName = localStorage.getItem("selectedCharacterName") || "Herói";

            document.getElementById("player-name").textContent = `${playerName} - ${characterName}`;

            const avatar = document.getElementById("player-avatar");
            if (characterPhoto) {
                const img = document.createElement("img");
                img.src = characterPhoto;
                avatar.appendChild(img);
            }

            const startButton = document.getElementById("start-battle-btn");
            const victoryMessage = document.getElementById("victory-message");

            startButton.addEventListener("click", () => {
                // Simulação de batalha
                startButton.style.display = "none"; // esconde o botão
                victoryMessage.style.display = "block"; // mostra mensagem de vitória
            });
        });
    </script>

</body>
</html>
