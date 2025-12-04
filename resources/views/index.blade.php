<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Nekro: Guerra pela Névoa Eterna</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

  body {
    margin: 0;
    height: 100vh;
    font-family: 'Orbitron', sans-serif;
    background: radial-gradient(circle at top, #000000, #0b0015);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow-x: hidden;
    position: relative;
  }

  /* Névoa e partículas de fundo */
  .bg {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    overflow: hidden;
    z-index: 1;
    pointer-events: none;
  }

  .particle {
    position: absolute;
    width: 10px; height: 10px;
    border-radius: 50%;
    background: linear-gradient(135deg, #7a1cff, #00aaff);
    filter: blur(4px);
    animation: float 10s infinite ease-in-out alternate;
    opacity: 0.8;
  }

  .fog {
    position: absolute;
    width: 200%;
    height: 200%;
    top: -50%;
    left: -50%;
    background: radial-gradient(circle, rgba(10,0,30,0.2), transparent 70%);
    animation: drift 60s linear infinite;
    z-index: 0;
    pointer-events: none;
  }

  @keyframes float {
    0% { transform: translateY(0) translateX(0); }
    100% { transform: translateY(-50px) translateX(50px); }
  }

  @keyframes drift {
    0% { transform: translate(0,0) rotate(0deg); }
    100% { transform: translate(50px,50px) rotate(360deg); }
  }

  /* Luz passando atrás do container */
  .container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(120deg, #7a1cff55, #00aaff55, #7a1cff55);
    filter: blur(120px);
    animation: lightMove 6s infinite alternate;
    z-index: -1;
    border-radius: 30px;
  }

  @keyframes lightMove {
    0% { transform: rotate(0deg) translateX(0); }
    100% { transform: rotate(360deg) translateX(50px); }
  }

  .container {
    position: relative;
    text-align: center;
    background: rgba(10, 0, 30, 0.85);
    border: 2px solid #7a1cff;
    border-radius: 20px;
    padding: 40px 20px;
    width: 95%;
    max-width: 900px;
    box-shadow: 0 0 40px rgba(120, 0, 255, 0.7);
    backdrop-filter: blur(6px);
    z-index: 10;
    box-sizing: border-box;
  }

  /* Título animado com gradiente */
  .game-title {
    font-size: 42px;
    background: linear-gradient(270deg, #00aaff, #7a1cff, #00aaff);
    background-size: 600% 600%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: gradientAnim 5s ease infinite;
    margin-bottom: 20px;
    letter-spacing: 2px;
    text-shadow: 0 0 10px #7a1cff, 0 0 20px #00aaff, 0 0 30px #7a1cff;
  }

  @keyframes gradientAnim {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  h2 {
    font-size: 32px;
    color: #7a1cff;
    text-shadow: 0 0 15px #7a1cff;
    margin-bottom: 30px;
  }

  .player-name-input {
    margin-bottom: 30px;
  }

  .player-name-input input {
    width: 80%;
    max-width: 350px;
    padding: 12px 20px;
    border-radius: 50px;
    border: 1px solid #7a1cff;
    background: rgba(20, 0, 40, 0.7);
    color: white;
    font-size: 16px;
    outline: none;
    text-align: center;
  }

  .characters {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 20px;
    justify-items: center;
    margin-bottom: 30px;
  }

  .character {
    position: relative;
    width: 140px;
    height: 220px;
    border-radius: 20px;
    border: 2px solid #7a1cff;
    background: rgba(15, 0, 35, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 15px rgba(120, 0, 255, 0.5);
  }

  .character img {
    width: 120px;
    height: auto;
    border-radius: 15px;
    transition: transform 0.3s ease;
  }

  .character:hover img {
    transform: scale(1.1);
  }

  .character.selected {
    border-color: #00aaff;
    box-shadow: 0 0 30px #00aaff;
    transform: scale(1.05);
  }

  .button-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
  }

  .btn {
    background: linear-gradient(90deg, #7a1cff, #00aaff);
    padding: 15px 40px;
    border-radius: 50px;
    border: none;
    color: white;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 0 20px rgba(120, 0, 255, 0.7);
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 40px rgba(120, 0, 255, 1);
  }
</style>
</head>
<body>

<div class="bg">
  <!-- Partículas neon -->
  <div class="particle" style="top:20%; left:10%; animation-delay:0s;"></div>
  <div class="particle" style="top:50%; left:40%; animation-delay:2s;"></div>
  <div class="particle" style="top:80%; left:70%; animation-delay:4s;"></div>
  <div class="particle" style="top:30%; left:80%; animation-delay:6s;"></div>
  <!-- Névoa animada -->
  <div class="fog"></div>
</div>

<div class="container">
  <h1 class="game-title">Nekro: Guerra pela Névoa Eterna</h1>
  <h2>Escolha seu personagem</h2>

  <div class="player-name-input">
    <input type="text" id="nome" placeholder="Digite seu nome..." />
  </div>

  <div class="characters">
    <div class="character" onclick="selectCharacter(this,'GuerreiraDasChamas.png','Guerreira das Chamas')">
      <img src="imagens/GuerreiraDasChamas.png" alt="Personagem 1">
    </div>
    <div class="character" onclick="selectCharacter(this,'ArqueiraCelestial.png','Arqueira Celestial')">
      <img src="imagens/ArqueiraCelestial.png" alt="Personagem 2">
    </div>
    <div class="character" onclick="selectCharacter(this,'MagoDasSombras.png','Mago das Sombras')">
      <img src="imagens/MagoDasSombras.png" alt="Personagem 3">
    </div>
    <div class="character" onclick="selectCharacter(this,'Lux.png','Lux')">
      <img src="imagens/Lux.png" alt="Personagem 4">
    </div>
  </div>

  <div class="button-container">
    <button class="btn" onclick="goNext()">Iniciar Aventura ➜</button>
  </div>
</div>

<script>
  let selectedCharacter = null;
  let selectedCharacterName = null;

  function selectCharacter(element, imageSrc, characterName) {
    document.querySelectorAll('.character').forEach(c => c.classList.remove('selected'));
    element.classList.add('selected');
    selectedCharacter = imageSrc;
    selectedCharacterName = characterName;
  }

  function goNext() {
    const nome = document.getElementById('nome').value.trim();
    if (!nome) {
      alert("Digite seu nome!");
      return;
    }
    if (!selectedCharacter) {
      alert("Escolha um personagem!");
      return;
    }
    localStorage.setItem("playerName", nome);
    localStorage.setItem("selectedCharacterPhoto", selectedCharacter);
    localStorage.setItem("selectedCharacterName", selectedCharacterName);
    window.location.href = "/fase1";
  }
</script>

</body>
</html>
