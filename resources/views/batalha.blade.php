<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Batalha – Void Berserker</title>

<!-- ÍCONES -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- ESTILO VOID BERSERKER -->
<style>
/* ===== RESET ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Verdana', sans-serif;
}

body {
    background: radial-gradient(circle at center, #0b0014, #050007, #000);
    color: #c9b9ff;
    padding: 20px;
    overflow-x: hidden;
}

/* ===== ANIMAÇÃO NEON ===== */
@keyframes neonGlow {
    0% { text-shadow: 0 0 10px #b100ff, 0 0 20px #5300ff; }
    100% { text-shadow: 0 0 20px #d77aff, 0 0 40px #7b00ff; }
}

/* ===== TÍTULO ===== */
h1 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 40px;
    color: #e4d4ff;
    text-transform: uppercase;
    letter-spacing: 3px;
    animation: neonGlow 2s infinite alternate;
}

/* ===== HUD ===== */
.health-box {
    width: 100%;
    background: #1a0b2e;
    border: 2px solid #5d1aff;
    height: 22px;
    border-radius: 6px;
    margin-bottom: 15px;
    overflow: hidden;
    position: relative;
}

.health-fill {
    height: 100%;
    background: linear-gradient(90deg, #7b00ff, #3900ff);
    width: 100%;
    transition: 0.3s;
}

.health-text {
    position: absolute;
    width: 100%;
    text-align: center;
    top: 0;
    font-size: 13px;
    color: #fff;
}

/* ===== CARTÕES ===== */
.card {
    width: 45%;
    background: rgba(10, 0, 20, 0.7);
    border: 2px solid #5d1aff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 0 25px #4500a0;
    transition: 0.2s;
}

.card-title {
    font-size: 22px;
    color: #bf9bff;
    margin-bottom: 10px;
    text-shadow: 0 0 10px #7b00ff;
}

/* Shake quando leva dano */
.shake {
    animation: shakeAnim 0.4s;
}

@keyframes shakeAnim {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* ===== CONTAINER GERAL ===== */
.battle-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
}

/* ===== ÁREA DE AÇÕES ===== */
.actions-box {
    background: rgba(20, 0, 40, 0.7);
    border: 2px solid #5300c9;
    padding: 20px;
    border-radius: 12px;
}

.action-category-title {
    color: #dcd1ff;
    font-size: 18px;
    margin-bottom: 10px;
    text-shadow: 0 0 8px #7b00ff;
}

.action-list {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
}

.action-btn {
    padding: 15px;
    background: #180028;
    border: 2px solid #5d1aff;
    border-radius: 10px;
    text-align: center;
    cursor: pointer;
    transition: 0.2s;
    color: white;
}

.action-btn:hover {
    background: #36006b;
    transform: scale(1.05);
    box-shadow: 0 0 15px #7b00ff;
}

/* ===== BATTLE LOG ===== */
#battle-log {
    background: rgba(10, 0, 30, 0.8);
    border: 2px solid #5d1aff;
    padding: 15px;
    border-radius: 10px;
    height: 200px;
    overflow-y: auto;
    color: #d7c1ff;
}

.log-message {
    margin-bottom: 8px;
}

.player-message { color: #7f4dff; }
.enemy-message { color: #ff6ea5; }
.system-message { color: #9bd0ff; }
.critical-message { color: #ff00e1; text-shadow: 0 0 10px #ff00f7; }

/* ===== OVERLAY (VITÓRIA/DERROTA) ===== */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(10, 0, 30, 0.85);
    display: none;
    justify-content: center;
    align-items: center;
}

.overlay.active {
    display: flex;
}

.overlay-box {
    background: #120021;
    border: 3px solid #7b00ff;
    padding: 25px;
    border-radius: 15px;
    text-align: center;
    width: 350px;
    box-shadow: 0 0 30px #7b00ff;
}

.overlay-box h2 {
    color: #d9c9ff;
    margin-bottom: 20px;
}

.overlay-box button {
    padding: 10px 20px;
    background: #5d1aff;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    width: 100%;
    transition: 0.2s;
}

.overlay-box button:hover {
    background: #8a3cff;
    box-shadow: 0 0 15px #9b61ff;
}

</style>
</head>

<body>

<h1>⚔️ Void Berserker – Batalha ⚡</h1>

<div class="battle-container">

    <!-- PLAYER -->
    <div class="card" id="player-card">
        <div class="card-title" id="player-name">Você</div>

        <div class="health-box">
            <div class="health-fill" id="player-health-bar"></div>
            <div class="health-text" id="player-health-text">100</div>
        </div>
    </div>

    <!-- ENEMY -->
    <div class="card" id="enemy-card">
        <div class="card-title">Monstro</div>

        <div class="health-box">
            <div class="health-fill" id="enemy-health-bar"></div>
            <div class="health-text" id="enemy-health-text">100</div>
        </div>
    </div>

</div>

<!-- AÇÕES -->
<div class="actions-box">

    <div class="action-category-title">⚔️ Ataques</div>
    <div class="action-list">
        <div class="action-btn" data-action="soco" data-damage="10">🌀 Golpe Etéreo<br>10 Dano</div>
        <div class="action-btn" data-action="raio-laser" data-damage="30">⚡ Raio do Vazio<br>30 Dano</div>
        <div class="action-btn" data-action="ataque-furtivo" data-damage="20">🌑 Corte Sombrio<br>20 Dano (+Crítico)</div>
    </div>

    <br>

    <div class="action-category-title">🛠 Utilidades</div>
    <div class="action-list" style="grid-template-columns: repeat(2, 1fr)">
        <div class="action-btn" data-action="kit-medico" data-damage="heal">💜 Essência do Vazio<br>Cura 20</div>
        <div class="action-btn" data-action="armadura" data-damage="shield">🛡 Escudo de Névoa<br>Bloqueia 10</div>
    </div>

</div>

<br>

<!-- LOG -->
<div id="battle-log"></div>

<!-- OVERLAY: Vitória -->
<div class="overlay" id="victory-overlay">
    <div class="overlay-box">
        <h2>🔥 Vitória!</h2>
        <button id="next-phase-btn">Próxima Fase</button>
    </div>
</div>

<!-- OVERLAY: Derrota -->
<div class="overlay" id="defeat-overlay">
    <div class="overlay-box">
        <h2>☠️ Derrota…</h2>
        <button id="retry-btn">Tentar Novamente</button>
    </div>
</div>

<!-- SCRIPT (colado exatamente da sua lógica, só formatado) -->
<script>
/* === SUA LÓGICA COMPLETA AQUI === */
/* EXATAMENTE igual, só colada com formatação melhor */

document.addEventListener('DOMContentLoaded', function() {

    const playerHealthBar = document.getElementById('player-health-bar');
    const playerHealthText = document.getElementById('player-health-text');
    const enemyHealthBar = document.getElementById('enemy-health-bar');
    const enemyHealthText = document.getElementById('enemy-health-text');
    const battleLogElement = document.getElementById('battle-log');

    const victoryOverlay = document.getElementById('victory-overlay');
    const defeatOverlay = document.getElementById('defeat-overlay');

    const nextPhaseBtn = document.getElementById('next-phase-btn');
    const retryBtn = document.getElementById('retry-btn');

    const actionButtons = document.querySelectorAll('.action-btn');

    const playerCard = document.getElementById('player-card');
    const enemyCard = document.getElementById('enemy-card');

    let gameState = {
        playerHealth: 100,
        enemyHealth: 100,
        playerShield: 0,
        enemyShield: 0,
        turn: 0,
        gameOver: false,
        score: 0,
        isPlayerTurn: true
    };

    function addLogMessage(message, type) {
        const div = document.createElement('div');
        div.className = `log-message ${type}-message`;
        div.innerHTML = message;
        battleLogElement.appendChild(div);
        battleLogElement.scrollTop = battleLogElement.scrollHeight;
    }

    function updateHealthBars() {
        playerHealthBar.style.width = gameState.playerHealth + "%";
        enemyHealthBar.style.width = gameState.enemyHealth + "%";

        playerHealthText.textContent = gameState.playerHealth;
        enemyHealthText.textContent = gameState.enemyHealth;
    }

    function checkGameOver() {
        if (gameState.enemyHealth <= 0) {
            gameState.gameOver = true;
            victoryOverlay.classList.add('active');
            return true;
        }
        if (gameState.playerHealth <= 0) {
            gameState.gameOver = true;
            defeatOverlay.classList.add('active');
            return true;
        }
        return false;
    }

    function enemyTurn() {
        const attacks = [
            { name: "Garra Sombria", damage: 12 },
            { name: "Fogo Abissal", damage: 18 },
            { name: "Investida Caótica", damage: 15 }
        ];

        const atk = attacks[Math.floor(Math.random() * attacks.length)];
        let dmg = atk.damage;

        if (gameState.playerShield > 0) {
            const blocked = Math.min(dmg, gameState.playerShield);
            dmg -= blocked;
            gameState.playerShield = 0;
            addLogMessage(`Seu escudo bloqueou <strong>${blocked}</strong> de dano!`, "system");
        }

        gameState.playerHealth -= dmg;
        playerCard.classList.add("shake");
        setTimeout(() => playerCard.classList.remove("shake"), 500);

        addLogMessage(`O monstro usou <strong>${atk.name}</strong> e causou <strong>${dmg}</strong> de dano!`, "enemy");

        updateHealthBars();
        if (!checkGameOver()) {
            gameState.isPlayerTurn = true;
        }
    }

    function playerAction(action, amount) {
        if (!gameState.isPlayerTurn || gameState.gameOver) return;
        gameState.isPlayerTurn = false;

        let dmg = 0;

        switch (action) {
            case "soco":
            case "raio-laser":
                dmg = parseInt(amount);
                break;

            case "ataque-furtivo":
                dmg = parseInt(amount);
                if (Math.random() < 0.3) {
                    dmg *= 2;
                    addLogMessage(`ATAQUE CRÍTICO! <strong>${dmg}</strong> de dano!`, "critical");
                }
                break;

            case "kit-medico":
                gameState.playerHealth += 20;
                addLogMessage(`Você recuperou <strong>20</strong> de HP!`, "player");
                updateHealthBars();
                setTimeout(enemyTurn, 1400);
                return;

            case "armadura":
                gameState.playerShield = 10;
                addLogMessage(`Escudo ativado! Bloqueará <strong>10</strong> de dano.`, "system");
                setTimeout(enemyTurn, 1400);
                return;
        }

        gameState.enemyHealth -= dmg;
        enemyCard.classList.add("shake");
        setTimeout(() => enemyCard.classList.remove("shake"), 500);

        addLogMessage(`Você usou um ataque e causou <strong>${dmg}</strong> de dano!`, "player");
        updateHealthBars();

        if (!checkGameOver()) {
            setTimeout(enemyTurn, 1400);
        }
    }

    actionButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            const action = btn.getAttribute("data-action");
            const dmg = btn.getAttribute("data-damage");
            playerAction(action, dmg);
        });
    });

    nextPhaseBtn.addEventListener('click', () => location.href = "fase12");
    retryBtn.addEventListener('click', () => location.href = "fase12");

    updateHealthBars();
});
</script>

</body>
</html>
