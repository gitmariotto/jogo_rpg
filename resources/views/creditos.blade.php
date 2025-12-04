<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créditos – Void Berserker</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Verdana', sans-serif;
        }

        body {
            background: radial-gradient(circle at center, #0b0014, #050007, #000);
            color: #d7c1ff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: hidden;
            position: relative;
        }

        /* Efeito neon violeta no fundo */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 0, 255, 0.25), transparent 60%),
                radial-gradient(circle at 80% 20%, rgba(0, 100, 255, 0.18), transparent 60%);
            z-index: -1;
        }

        /* Container */
        .credits-box {
            width: 90%;
            max-width: 550px;
            padding: 40px;
            background: rgba(10, 0, 30, 0.8);
            border: 2px solid #5d1aff;
            border-radius: 20px;
            box-shadow: 0 0 35px #5d1aff, inset 0 0 20px #25004a;
            text-align: center;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to   { opacity: 1; transform: scale(1); }
        }

        /* Título */
        h1 {
            font-size: 38px;
            color: #e9d8ff;
            margin-bottom: 25px;
            text-transform: uppercase;
            text-shadow:
                0 0 10px #7b00ff,
                0 0 20px #8f3dff,
                0 0 40px #7b00ff;
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0%   { text-shadow: 0 0 10px #7b00ff; }
            100% { text-shadow: 0 0 25px #b56cff; }
        }

        /* Seções */
        .section {
            margin-bottom: 25px;
            animation: slideUp 0.6s ease forwards;
            opacity: 0;
        }

        .section:nth-child(2) { animation-delay: .3s; }
        .section:nth-child(3) { animation-delay: .6s; }
        .btn-area            { animation-delay: 1s; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(25px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            color: #9f62ff;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .section-content {
            font-size: 20px;
            color: #e6dfff;
            text-shadow: 0 0 4px #7b00ff;
        }

        /* Botão */
        .btn {
            margin-top: 25px;
            padding: 14px 20px;
            background: linear-gradient(135deg, #7b00ff, #3900ff);
            border: 2px solid #8f3dff;
            border-radius: 12px;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            max-width: 280px;
            box-shadow: 0 0 15px #7b00ff;
            transition: 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px #a569ff;
        }

    </style>
</head>

<body>

    <div class="credits-box">

        <h1>Créditos</h1>

        <div class="section">
            <div class="section-title">Desenvolvimento</div>
            <div class="section-content">
                Nicoly Souza<br>
                (Void Berserker Edition)
            </div>
        </div>

        <div class="section">
            <div class="section-title">Projeto</div>
            <div class="section-content">
                Interface • Design • Adaptação do Tema<br>
                “Sombras do Vazio”
            </div>
        </div>

        <div class="section btn-area">
            <a href="/" class="btn">Menu Principal</a>
        </div>

    </div>

</body>
</html>
