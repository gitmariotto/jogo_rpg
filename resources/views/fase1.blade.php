<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Escolha seu Equipamento - Void Berserker</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        :root {
            --dark: #05010a;
            --card: rgba(15, 5, 30, 0.8);
            --purple: #7a1cff;
            --blue: #00aaff;
            --fuchsia: #e600ff;
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
            position: relative;
        }

        /* Fundo nebulosa roxa animada */
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
            z-index: -2;
            animation: drift 60s linear infinite;
        }

        @keyframes drift {
            0% { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(40px,40px) rotate(360deg); }
        }

        /* CONTAINER PRINCIPAL */
        .container {
            width: 90%;
            max-width: 1100px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            background: rgba(5, 0, 15, 0.8);
            border: 1px solid rgba(120, 0, 255, 0.4);
            border-radius: 14px;
            box-shadow: 0 0 25px rgba(140, 0, 255, 0.4);
            backdrop-filter: blur(8px);
            animation: fade 1.2s ease-out;
            position: relative;
            z-index: 1;
        }

        @keyframes fade {
            from { opacity: 0; transform: scale(.94); }
            to   { opacity: 1; transform: scale(1); }
        }

        /* Neblina animada dentro do container */
        .container::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(120,0,255,0.15), transparent 70%);
            filter: blur(80px);
            animation: drift 80s linear infinite;
            z-index: 0;
            pointer-events: none;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            font-size: 32px;
            letter-spacing: 3px;
            color: var(--purple);
            text-shadow: var(--neon) var(--purple);
            margin-bottom: 25px;
        }

        /* JOGADOR */
        .player-info {
            display: inline-flex;
            gap: 15px;
            padding: 12px 20px;
            background: rgba(20, 0, 45, 0.6);
            border: 1px solid rgba(140, 0, 255, 0.4);
            border-radius: 12px;
            margin-bottom: 35px;
            box-shadow: 0 0 15px rgba(140, 0, 255, 0.3);
        }

        .player-avatar {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid var(--purple);
            box-shadow: 0 0 12px var(--purple);
        }

        .player-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .player-name {
            font-size: 16px;
            letter-spacing: 2px;
        }

        /* GRID */
        .equipment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }

        /* CATEGORIAS */
        .category {
            background: var(--card);
            padding: 15px;
            border-radius: 10px;
            border: 1px solid rgba(130, 0, 255, 0.4);
            box-shadow: 0 0 15px rgba(130, 0, 255, 0.25);
            transition: .3s;
            position: relative;
        }

        .category:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgba(130, 0, 255, 0.5);
        }

        .category-title {
            font-size: 18px;
            margin-bottom: 12px;
            padding-bottom: 6px;
            border-bottom: 2px solid var(--purple);
            color: var(--purple);
            text-shadow: var(--neon) var(--purple);
        }

        /* OPÇÕES */
        .option {
            display: flex;
            align-items: center;
            background: rgba(20, 3, 40, 0.7);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 8px;
            cursor: pointer;
            border: 1px solid transparent;
            transition: .2s;
            position: relative;
        }

        .option:hover {
            background: rgba(40, 0, 80, 0.7);
            transform: scale(1.03);
        }

        .option.selected {
            border-color: var(--purple);
            background: rgba(130, 0, 255, 0.25);
            box-shadow: 0 0 12px var(--purple);
            animation: glowPulse 1.2s infinite alternate;
        }

        @keyframes glowPulse {
            0% { box-shadow: 0 0 12px var(--purple); }
            100% { box-shadow: 0 0 25px var(--purple); }
        }

        .option-icon {
            width: 38px;
            height: 38px;
            background: rgba(120, 0, 255, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 6px;
            margin-right: 12px;
            border: 1px solid var(--purple);
        }

        .option-info {
            flex: 1;
        }

        .option-name {
            font-size: 14px;
            font-weight: bold;
        }

        .option-desc {
            font-size: 11px;
            opacity: .7;
        }

        .option input {
            display: none;
        }

        /* BOTÕES */
        .button-container {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 20px;
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

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--purple);
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: rgba(130, 0, 255, 0.3);
            box-shadow: 0 0 20px var(--purple);
        }

        /* Fade-out feedback */
        .fade-out {
            animation: fadeOut 0.8s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; transform: scale(1); }
            100% { opacity: 0; transform: scale(0.95); }
        }

    </style>
</head>
<body>

    <div class="container" id="container">
        <h2>Escolha Seu Equipamento</h2>

        <div class="player-info">
            <div class="player-avatar" id="player-avatar"></div>
            <div class="player-name" id="player-name"></div>
        </div>

        <div class="equipment-grid">

            <!-- ESCUDOS -->
            <div class="category">
                <div class="category-title">Escudos</div>

                <div class="option" data-category="shield">
                    <input type="radio" name="shield">
                    <div class="option-icon">🛡️</div>
                    <div class="option-info">
                        <div class="option-name">Muro Estelar</div>
                        <div class="option-desc">Absorve 80% do dano</div>
                    </div>
                </div>

                <div class="option" data-category="shield">
                    <input type="radio" name="shield">
                    <div class="option-icon">🔰</div>
                    <div class="option-info">
                        <div class="option-name">Aura de Recomposição</div>
                        <div class="option-desc">Regenera energia</div>
                    </div>
                </div>

                <div class="option" data-category="shield">
                    <input type="radio" name="shield">
                    <div class="option-icon">🌀</div>
                    <div class="option-info">
                        <div class="option-name">Vortex de Retorno</div>
                        <div class="option-desc">Reflete dano</div>
                    </div>
                </div>
            </div>

            <!-- ARMADURAS -->
            <div class="category">
                <div class="category-title">Armaduras</div>

                <div class="option" data-category="armor">
                    <input type="radio" name="armor">
                    <div class="option-icon">🥼</div>
                    <div class="option-info">
                        <div class="option-name">Armadura de Fênix</div>
                        <div class="option-desc">+15 agilidade</div>
                    </div>
                </div>

                <div class="option" data-category="armor">
                    <input type="radio" name="armor">
                    <div class="option-icon">🦺</div>
                    <div class="option-info">
                        <div class="option-name">Armadura do Guardião Solar</div>
                        <div class="option-desc">+25 defesa</div>
                    </div>
                </div>

                <div class="option" data-category="armor">
                    <input type="radio" name="armor">
                    <div class="option-icon">🛡️</div>
                    <div class="option-info">
                        <div class="option-name">Armadura Titânica Obsidiana</div>
                        <div class="option-desc">+40 defesa</div>
                    </div>
                </div>
            </div>

            <!-- EQUIPAMENTOS -->
            <div class="category">
                <div class="category-title">Equipamentos</div>

                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment">
                    <div class="option-icon">🔦</div>
                    <div class="option-info">
                        <div class="option-name">Lente da Profundeza</div>
                        <div class="option-desc">Revela sombras</div>
                    </div>
                </div>

                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment">
                    <div class="option-icon">🧭</div>
                    <div class="option-info">
                        <div class="option-name">Bússola Fantasma</div>
                        <div class="option-desc">+20% velocidade</div>
                    </div>
                </div>

                <div class="option" data-category="equipment">
                    <input type="radio" name="equipment">
                    <div class="option-icon">🔋</div>
                    <div class="option-info">
                        <div class="option-name">Transdutor Arcana</div>
                        <div class="option-desc">Recarga 30% mais rápida</div>
                    </div>
                </div>
            </div>

            <!-- ATAQUES -->
            <div class="category">
                <div class="category-title">Ataques</div>

                <div class="option" data-category="attack">
                    <input type="radio" name="attack">
                    <div class="option-icon">⚡</div>
                    <div class="option-info">
                        <div class="option-name">Choque Eterico</div>
                        <div class="option-desc">Dano 50</div>
                    </div>
                </div>

                <div class="option" data-category="attack">
                    <input type="radio" name="attack">
                    <div class="option-icon">💥</div>
                    <div class="option-info">
                        <div class="option-name">Detonação Arcana</div>
                        <div class="option-desc">Dano 70</div>
                    </div>
                </div>

                <div class="option" data-category="attack">
                    <input type="radio" name="attack">
                    <div class="option-icon">❄️</div>
                    <div class="option-info">
                        <div class="option-name">Congelamento Fantasma</div>
                        <div class="option-desc">Congela 3s</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="button-container">
            <button class="btn" id="confirm-btn">Confirmar</button>
            <button class="btn btn-secondary" onclick="goBack()">Voltar</button>
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

            const options = document.querySelectorAll(".option");
            options.forEach(option => {
                option.addEventListener("click", function() {
                    const cat = this.dataset.category;
                    document.querySelectorAll(`.option[data-category="${cat}"]`).forEach(o => o.classList.remove("selected"));
                    this.classList.add("selected");
                    this.querySelector("input").checked = true;
                });
            });

            document.getElementById("confirm-btn").addEventListener("click", () => {
                const categories = ["shield", "armor", "equipment", "attack"];
                const selections = {};

                for (let cat of categories) {
                    const selected = document.querySelector(`.option[data-category="${cat}"] input:checked`);
                    if (!selected) {
                        alert("Selecione todas as categorias!");
                        return;
                    }
                    const opt = selected.closest(".option");
                    selections[cat] = {
                        name: opt.querySelector(".option-name").textContent,
                        description: opt.querySelector(".option-desc").textContent
                    };
                }

                // Salvar escolhas
                localStorage.setItem("equipmentSelections", JSON.stringify(selections));

                // Feedback visual: fade-out
                const container = document.getElementById("container");
                container.classList.add("fade-out");

                // Espera animação terminar antes de redirecionar
                setTimeout(() => {
                    window.location.href = "/batalha";
                }, 800); // corresponde à duração do fadeOut
            });
        });

        function goBack() {
            window.location.href = "/batalha";
        }
    </script>

</body>
</html>
